<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Autoecole;
use App\Models\Demande;
use App\Models\Province;
use App\Models\Region;
use Illuminate\Support\Facades\Mail;

class AutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->profile == 'admin') {
            return view('back-office.pages.auto-ecole.index', 
            [
                'ecoles'=>Admin::orderBy('created_at', 'desc')->where('profile', '=', 'auto-ecole')->get(),
            ]);  
        }elseif (Auth::user()->profile == 'dr') {
            return view('back-office.pages.auto-ecole.index', 
            [
                
                'ecoles'=>Admin::where('region_id', Auth::user()->region_id)
                                    ->where('profile', '=', 'auto-ecole')
                                    ->orderBy('created_at', 'desc')
                                    ->get(),
            ]);
            
        }else {
           
            return view('back-office.pages.auto-ecole.index',
            [
                'ecoles' => Admin::where('province_id', Auth::user()->province_id)
                                        ->where('profile', '=', 'auto-ecole')
                                        ->orderBy('created_at', 'desc')
                                        ->get(),
            ]);
            
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
        if (Auth::user()->profile == 'admin') {
            
           return view('back-office.pages.auto-ecole.create', 
           [
               'ecole'   => new Admin,
               'ecoles'   => Admin::where('profile', '=', 'auto-ecole')->orderBy('nom', 'asc')->get(),
               'region'   => Region::orderBy('libelle', 'asc')->get(),
               'province' => Province::orderBy('libelle', 'asc')->get(),
               
           ]);
        }elseif (Auth::user()->profile == 'dr') {
            
             
            return view('back-office.pages.auto-ecole.create', 
            [
                'ecole'   => new Admin,
                'ecoles'   => Admin::where('region_id', Auth::user()->region_id)
                                        ->where('profile', '=', 'auto-ecole')
                                        ->orderBy('created_at', 'desc')
                                        ->limit(10)
                                        ->get(),
                'region'   => Region::where('uuid', Auth::user()->region_id)->first(),
                'province' => Province::where('region_id',Auth::user()->region_id)->orderBy('libelle', 'asc')->get(),
                
            ]);         
            
        }else {
            
            
            return view('back-office.pages.auto-ecole.create', 
            [
                'ecole'   => new Admin,
                'ecoles'   => Admin::where('province_id', Auth::user()->province_id)
                                        ->where('profile', '=', 'auto-ecole')
                                        ->orderBy('created_at', 'desc')
                                        ->limit(10)
                                         ->get(),
                'region'   => Region::where('uuid', Auth::user()->region_id)->first(),
                'province' => Province::where('region_id',Auth::user()->region_id)->orderBy('libelle', 'asc')->get(),
                
            ]);      
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

        // dd($request->all());
        if (isset($request->revoquer)) {
        $desactiver = $request->revoquer;
    
    }
    else{
        $desactiver =false;
    }
        $pasword = Str::random(8);
        $request->validate([
            'libelle' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:admins',
            'numero' => 'required|string|max:255',
            'paysId' => 'required',
            'villeId' => 'required',
            'photo' => 'required',
            
        ]);
        if ($request->file('photo') == null) {
            $file = "";
        }else{
           $file = $request->file('photo')->store('users', 'public');  
        }
        if (isset($request->revoquer)) {
            $desactiver = $request->revoquer;
        }
        else{
            $desactiver =false;
        }
       
        $auto = Admin::create([
            'nom' => $request->libelle,
            'email' => $request->email,
            'numero' => $request->numero,
            'region_id' => $request->paysId,
            'province_id' => $request->villeId,
            'profile'  => $request->profile,
            'password' => Hash::make($pasword),
            'active'=>$desactiver,
            'photo'=> $file,

        ]);
        Mail::send('front-office.partials.MailTouser', ['user' => $auto, 'nom' => $auto->nom,  'pasword' => $pasword], function ($message) use ($auto, $pasword) {
                    $message->from(\Config::get('mail.from.address'), 'INSCRIPTION A L’OPERATION PERMIS DE CONDUIRE (OPC)');

                    $message->to($auto['email']);
                    $message->subject('Création de compte');
                });

            return redirect()->route('autoecoles')->with('success', 'Auto école crée avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
     return view('back-office.pages.auto-ecole.show',
     [
        'ecole'   => Admin::where('uuid', $uuid)->first(),
     ]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        
        if (Auth::user()->profile == 'admin') {
            
            return view('back-office.pages.auto-ecole.create', 
            [
                'ecole'   => Admin::where('uuid', $uuid)->first(),
                'region'   => Region::orderBy('libelle', 'asc')->get(),
                'ecoles'   => Admin::where('profile', '=', 'auto-ecole')->orderBy('nom', 'asc')->limit(10)->get(),
                'province' => Province::orderBy('libelle', 'asc')->get(),
                
            ]);
         }elseif (Auth::user()->profile == 'dr') {
             
              
             return view('back-office.pages.auto-ecole.create', 
             [
                 'ecole'   => Admin::where('uuid', $uuid)->first(),
                 'ecoles'   => Admin::where('region_id', Auth::user()->region_id)
                                         ->where('profile', '=', 'auto-ecole')
                                         ->orderBy('created_at', 'desc')
                                         ->limit(10)
                                         ->get(),
                 'region'   => Region::where('uuid', Auth::user()->region_id)->first(),
                 'province' => Province::where('region_id',Auth::user()->region_id)->orderBy('libelle', 'asc')->get(),
                 
             ]);         
             
         }else {
             
             
             return view('back-office.pages.auto-ecole.create', 
             [
                'ecole'   =>  Admin::where('uuid', $uuid)->first(),
                'ecoles'   => Admin::where('province_id', Auth::user()->province_id)
                                        ->orderBy('created_at', 'desc')
                                        ->where('profile', '=' ,'auto-ecole')
                                        ->limit(10)
                                        ->get(),
                'region'   => Region::where('uuid', Auth::user()->region_id)->first(),
                'province' => Province::where('region_id',Auth::user()->region_id)->orderBy('libelle', 'asc')->get(),
             ]);      
         }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'paysId' => 'required',
            'villeId' => 'required',
            
        ]);
       
         admin::where('uuid',$uuid)->first()->update([

            'libelle' => $request->libelle,
            'email' => $request->email,
            'numero' => $request->numero,
            'region_id' => $request->paysId,
            'province_id' => $request->villeId,
            
            // 'active'=>$desactiver,

        ]);
        return redirect()->route('edit-ecole', $uuid)->with('success', ''.$request->libelle.' modifiée avec succes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        if (Demande::where('transfere_autoecole_id', $uuid)->get()->count() ==0) {
        admin::where('uuid',$uuid)->first()->delete();
        return redirect()->route('autoecoles')->with('success', 'Auto école supprimée avec succes');
    } else {
            return redirect()->route('autoecoles')->with('danger', 'Impossible de supprimer cet auto école');
            # code...
        }
    }
    public function profile($uuid)
    {
        return view(
            'back-office.pages.auto-ecole.profile',
            [
                
                'user' => Admin::where('uuid', $uuid)->first(),
                'titre' => Admin::where('uuid', $uuid)->first()->nom." ". Admin::where('uuid', $uuid)->first()->prenom,
                'break' => Admin::where('uuid', $uuid)->first()->nom . ' ' . Admin::where('uuid', $uuid)->first()->prenom,
            ]
        );
    }
    public function candidatparecoles()
    {
        
        if (Auth::user()->profile == 'auto-ecole') {
            

            return view('back-office.pages.auto-ecole.listecandidat', [
                
                'demandes'=> Demande::where('transfere_autoecole_id', '=', Auth::user()->ecole_id)
                                    ->where('abandon_status', 0)  
                                    ->get(),
            ]);
        } 
        
    }
    public function autosinglecandidat($uuid)
    {

        if (Auth::user()->profile == 'auto-ecole') {
            

            return view('back-office.pages.auto-ecole.detail', [
                     'demande'=> Demande::where('uuid', '=', $uuid)
                                      ->first(),
                    'demandes'=> Demande::where('transfere_autoecole_id', '=', Auth::user()->uuid)
                                        ->where('uuid', '!=', $uuid)
                                                ->get()
            ]);
        } 
        
    }
    public function cadidatcodevalide(){
        return view('back-office.pages.auto-ecole.listecandidat', [
            'demandes'=> Demande::where('transfere_autoecole_id', '=', Auth::user()->uuid)
                                  ->where('code_status', 1)
                                  ->get(),
        ]);
    }
    public function cadidatcrenauvalide(){
        return view('back-office.pages.auto-ecole.listecandidat', [
            'demandes'=> Demande::where('transfere_autoecole_id', '=', Auth::user()->uuid)
                                  ->where('creneau_status', 1)
                                  ->get(),
        ]);
    }
    public function cadidatconduitevalide(){
    
        return view('back-office.pages.auto-ecole.listecandidat', [
            'demandes'=> Demande::where('transfere_autoecole_id', '=', Auth::user()->uuid)
                                  ->where('conduite_status', 1)
                                  ->get(),
        ]);
    }
    public function cadidatpermisvalide(){
       dd(Auth::user());
        return view('back-office.pages.auto-ecole.listecandidat', [
            'demandes'=> Demande::where('transfere_autoecole_id', '=', Auth::user()->uuid)
                                  ->where('permis_status', 1)
                                  ->get(),
        ]);
    }
    public function cadidatabandon(){
        return view('back-office.pages.auto-ecole.listecandidat', [
            'demandes'=> Demande::where('transfere_autoecole_id', '=', Auth::user()->uuid)
                                  ->where('abandon_status', 1)
                                  ->get(),
        ]);
    }
    public function cadidatabandonner(Request $request, $uuid){
        
        $demande= Demande::where('uuid', $uuid)->first();
        $demande->abandon_status= true;
        $demande->save();
       
        return redirect()->route('candidatparecole')->with('success', 'Statut abandonner modifier avec success');

    }
    public function ecolesaveExamen(Request $request, $uuid)
    {
      

        if ($request->type == 'code') {
            $demande = Demande::where('uuid', $uuid)->first()->update([
                'code_status'=> true,
            ]);
            if ($demande) {
               Autoecole::create([
                'ecole_id' =>Auth::user()->uuid,
                'demande_id'=>$uuid,
               ]);
            }
           
        } elseif ($request->type == 'crenau') {
        
            $demande = Demande::where('uuid', $uuid)->first()->update([
                'creneau_status'=> true,
            ]);
            

        }elseif ($request->type == 'conduite') {
            $demande = Demande::where('uuid', $uuid)->first()->update([
                'conduite_status'=> true,
                
            ]);

        }else {
            $demande = Demande::where('uuid', $uuid)->first()->update([
                'permis_status'=> true,
            ]);
        }
        return redirect()->route('candidatparecole')->with('success', 'Statut changé avec success');
        
    }
    public function rapport()
    {
       
        return view('back-office.pages.auto-ecole.rapport', [
            'demandes'=> Demande::where('transfere_autoecole_id', '=', Auth::user()->uuid)
                                  ->orwhere('code_status', 1)
                                  ->where('creneau_status', 1)
                                  ->where('conduite_status', 1)
                                  ->where('abandon_status', 1)
                                  ->get(),
        ]);
    }
}
