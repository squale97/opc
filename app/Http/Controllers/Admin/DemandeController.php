<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

use App\Models\Admin;
use App\Models\Demande;
use App\Models\EcoleRegion;
use App\Models\Parametre;
use App\Models\Region;
use App\Models\Session;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    protected $guard = 'admin';

    protected $redirectTo = '/admin';

    protected $loginPath = '/admin/login';

    public function __construct()
    {
        $this->redirectTo = '/admin';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->profile == 'admin') {

            return view(
                'back-office.pages.candidatures.indexrejet',
                [
                    'demandes' => Demande::orderBy('created_at', 'desc')->get(),
                    'titre' => 'Demandes',
                    'break' => 'Demandes',
                    // 'ecoles' => Admin::all()
                ]
            );
        } elseif (Auth::user()->profile == 'dr') {
            return view(
                'back-office.pages.candidatures.indexrejet',
                [

                    'demandes' => Demande::where('region_id', Auth::user()->region_id)
                        ->orderBy('created_at', 'desc')
                        ->get(),
                    'titre' => 'Demandes',
                    'break' => 'Demandes',
                    // 'ecoles' => Admin::where('region_id', Auth::user()->region_id)->get()
                ]
            );
        } else {
            return view(
                'back-office.pages.candidatures.indexrejet',
                [
                    'demandes' => Demande::where('province_id', Auth::user()->province_id)->orderBy('created_at', 'desc')->get(),
                    'titre' => 'Demandes',
                    'break' => 'Demandes',
                    // 'ecoles' => Admin::where('province_id', Auth::user()->province_id)->get()

                ]
            );
        }
    }
    public function nouvelleDemande()
    {
        if (Auth::user()->profile == 'admin') {
            return view(
                'back-office.pages.candidatures.nouvelle',
                [
                    'demandes' => Demande::orderBy('created_at', 'desc')
                        ->where('status_demande', '=', null)
                        ->orderBy('created_at', 'desc')
                        ->get(),
                    'titre' => 'Nouvelles demandes',
                    'break' => 'Nouvelles demandes',

                ]
            );
        } elseif (Auth::user()->profile == 'dr') {

            return view(
                'back-office.pages.candidatures.nouvelle',
                [
                    'demandes' => Demande::where('region_id', Auth::user()->region_id)
                        ->where('status_demande', '=', null)
                        ->orderBy('created_at', 'desc')
                        ->get(),
                    'titre' => 'Nouvelles demandes',
                    'break' => 'Nouvelles demandes',

                ]
            );
        } else {
            return view(
                'back-office.pages.candidatures.nouvelle',
                [
                    'demandes' => Demande::where('province_id', Auth::user()->province_id)
                        ->where('status_demande', '=', null)
                        ->orderBy('created_at', 'desc')
                        ->get(),
                    'titre' => 'Nouvelles demandes',
                    'break' => 'Nouvelles demandes',

                ]
            );
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function demandesrejet()
    {
        if (Auth::user()->profile == 'admin') {
            return view(
                'back-office.pages.candidatures.indexrejet',
                [
                    'demandes' => Demande::orderBy('created_at', 'desc')
                        ->where('status_demande', '=', 'rejete')
                        ->orderBy('created_at', 'desc')
                        ->get(),
                    'titre' => 'demandes rejetées',
                    'break' => 'Demandes rejetées'
                ]
            );
        } elseif (Auth::user()->profile == 'dr') {
            return view(
                'back-office.pages.candidatures.indexrejet',
                [

                    'demandes' => Demande::where('region_id', Auth::user()->region_id)
                        
                        ->where('status_demande', '=', 'rejete')
                        ->orderBy('created_at', 'desc')
                        ->get(),
                    'titre' => 'demandes rejetées',
                    'break' => 'Demandes rejetées'
                ]
            );
        } else {
            return view(
                'back-office.pages.candidatures.indexrejet',
                [
                    'demandes' => Demande::where('province_id', Auth::user()->province_id)
                        ->where('status_demande', '==', 'rejete')
                        ->orderBy('created_at', 'desc')
                        ->get(),
                    'titre' => 'demandes rejetées',
                    'break' => 'Demandes rejetées'
                ]
            );
        }
    }
    public function demandesPreselectionner()
    {

        if (Auth::user()->profile == 'admin') {
            return view(
                'back-office.pages.candidatures.indexrejet',
                [
                    'demandes' => Demande::where('status_demande', '=', 'preselectionne')
                    ->where('transfere_autoecole_id', '=', null)

                        ->orderBy('created_at', 'desc')
                        ->get(),
                    'titre' => 'demandes préselectionnées',
                    'break' => 'Demandes préselectionnées'
                ]
            );
        } elseif (Auth::user()->profile == 'dr') {
            return view(
                'back-office.pages.candidatures.indexrejet',
                [

                    'demandes' => Demande::where('region_id', Auth::user()->region_id)
                       
                        ->where('status_demande', '=', 'preselectionne')
                        ->where('transfere_autoecole_id', '=', null)

                        ->orderBy('created_at', 'desc')
                        ->get(),
                    'titre' => 'demandes préselectionnées',
                    'break' => 'Demandes préselectionnées'
                ]
            );
        } else {
         
            return view(
                'back-office.pages.candidatures.indexrejet',
                [
                    'demandes' => Demande::where('province_id', Auth::user()->province_id)
                        ->where('status_demande', '=', 'preselectionne')
                        ->where('transfere_autoecole_id', '=', null)

                        ->orderBy('created_at', 'desc')
                        ->get(),
                    'titre' => 'demandes préselectionnées',
                    'break' => 'Demandes préselectionnées'
                ]
            );
        }
    }
    public function demandesSelectionner()
    {
        if (Auth::user()->profile == 'admin') {
            return view(
                'back-office.pages.candidatures.index',
                [
                    'demandes' => Demande::orderBy('created_at', 'desc')
                        ->where('status_demande', '=', 'selectionne')
                        ->where('transfere_autoecole_id', '=', null)
                        ->orderBy('created_at', 'desc')
                        ->get(),
                    'titre' => 'demandes selectionnées',
                    'break' => 'Demandes selectionnées',
                    // 'ecoles' => Admin::all()
                ]
            );
        } elseif (Auth::user()->profile == 'dr') {
            return view(
                'back-office.pages.candidatures.index',
                [

                    'demandes' => Demande::where('region_id', Auth::user()->region_id)                       
                        ->where('status_demande', '=', 'selectionne')
                        ->where('transfere_autoecole_id', '=', null)
                        ->orderBy('created_at', 'desc')
                        ->get(),
                    'titre' => 'demandes selectionnées',
                    'break' => 'Demandes selectionnées',
                    'ecoles' => Admin::where('region_id', Auth::user()->region_id)
                    //                   ->get()
                ]
            );
        } else {
            
            return view(
                'back-office.pages.candidatures.index',
                [
                    'demandes' => Demande::where('province_id', Auth::user()->province_id)
                        ->where('status_demande', '=', 'selectionne')
                        ->where('transfere_autoecole_id', '=', null)
                        ->orderBy('created_at', 'desc')
                        ->get(),
                    'titre' => 'demandes selectionnées',
                    'break' => 'Demandes selectionnées',
                    // 'ecoles' => Admin::where('province_id', Auth::user()->province_id)->get()
                ]
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changestatusDemande(Request $request)
    {
        if (Auth::user()->profile == 'dr') {

            $demande = Demande::where('region_id', Auth::user()->region_id)->where('uuid', $request->demandeid)->first();
            $demande->status_demande = $request->statut;
            $demande->save();
        } elseif (Auth::user()->profile == 'dp') {
            $demande = Demande::where('province_id', Auth::user()->province_id)->where('uuid', $request->demandeid)->first();
            $demande->status_demande = $request->statut;
            $demande->save();
        } else {

            $demande = Demande::where('uuid', $request->demandeid)->first();
            $demande->status_demande = $request->statut;
            $demande->save();
        }
        if ($request->statut == 'preselectionne') {
            $d = 'préselectionnée';
        } elseif ($request->statut == 'selectionne') {
            $d = 'selectionnée';
        } else {
            $d = 'rejetée';
        }
        if($request->statut == "selectionne"){
            Mail::send('back-office.partials.mailtousers', [
                'user' => $demande, 
                'parametre'=> Parametre::first(),
                'nom' => $demande->nom], function ($message) use ($demande) {
                $message->from(\Config::get('mail.from.address'), 'INSCRIPTION A L’OPERATION PERMIS DE CONDUIRE (OPC)');
    
                $message->to($demande['email']);
                $message->subject('Dossier d’INSCRIPTION A L’OPERATION PERMIS DE CONDUIRE');
            });
        }
        if($request->statut == "preselectionne"){
            Mail::send('back-office.partials.notifieUser', [
                'user' => $demande, 
                'parametre'=> Parametre::first(),
                'nom' => $demande->nom], function ($message) use ($demande) {
                $message->from(\Config::get('mail.from.address'), 'INSCRIPTION A L’OPERATION PERMIS DE CONDUIRE (OPC)');
    
                $message->to($demande['email']);
                $message->subject('Dossier d’INSCRIPTION A L’OPERATION PERMIS DE CONDUIRE');
            });
        }
        if ($request->statut == "rejete") {
            Mail::send('back-office.partials._mailtousers', [
                'user' => $demande, 
                'parametre'=> Parametre::first(),
                'nom' => $demande->nom], function ($message) use ($demande) {
                $message->from(\Config::get('mail.from.address'), 'INSCRIPTION A L’OPERATION PERMIS DE CONDUIRE (OPC)');
    
                $message->to($demande['email']);
                $message->subject('Dossier d’INSCRIPTION A L’OPERATION PERMIS DE CONDUIRE');
            });
        }
       
        return redirect()->route('demandes')->with('success', 'La demande a été ' . $d. ' avec succes');
    }
    public function showDemande($uuid)
    {
        if (Auth::user()->profile == 'dr') {


            $demande = Demande::where('region_id', Auth::user()->region_id)->where('uuid', $uuid)->first();

            return view(
                'back-office.pages.candidatures.show',
                [
                    'demande' => $demande,
                    'titre' => 'Demande',
                    'break' => $demande->nomcomplet,
                    'ecoles' => EcoleRegion::where('region_id', Auth::user()->region_id)
                                             ->get()
                ]
            );
        } elseif (Auth::user()->profile == 'dp') {
            $demande = Demande::where('province_id', Auth::user()->province_id)->where('uuid', $uuid)->first();


            return view(
                'back-office.pages.candidatures.show',
                [
                    'demande' => $demande,
                    'titre' => 'Demande',
                    'break' => $demande->nomcomplet,
                    'ecoles' => EcoleRegion::where('region_id', Auth::user()->region_id)->get()
                ]
            );
        } else {

            $demande = Demande::where('uuid', $uuid)->first();

            return view(
                'back-office.pages.candidatures.show',
                [
                    'demande' => $demande,
                    'titre' => 'Demande',
                    'break' => $demande->nomcomplet,
                    'ecoles' => EcoleRegion::where('region_id', $demande->region_id)->get()

                ]
            );
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function transferer(Request $request, $uuid)
    {
        // dd($request->all());
        $demande = Demande::where('uuid', $uuid)->first();
      
        try {
           
            $demande->update([
                'transfere_autoecole_id' => $request->transfere_autoecole_id,
                'admin_transfere_autoecole_id' => Auth::user()->uuid,
            ]);
            return redirect()->route('demande-show', $uuid)->with('success', 'Le candidat a été affecté avec success');
        } catch (\Throwable $th) {
            return redirect()->route('demande-show', $uuid)->with('warning', "L'affectation  de la demande a echoué ");
        }
    }


    public function multipleTransfere(Request $request)
    {
        $demandeId = explode(',', $request->demandeToTransfer);
        //  dd($demandeId);

        foreach ($demandeId as $demande) {
            if ($demande != null) {
                $demande = Demande::where('uuid', $demande)->first();
                $demande->transfere_autoecole_id    = $request->transfere_Admin_id;
                $demande->admin_transfere_autoecole_id  = Auth::user()->uuid;
                $demande->save();
            }
        }
        return redirect()->route('demandes')->with('success', 'Cadidats affectés avec success au' . $demande->ecole->libelle);
    }
    public function rapportaccueil()
    {
       return view('back-office.pages.rapport.session',['sessions'=>Session::orderBy('created_at', 'desc')->get()]);
    }
    public function rapport($uuid){

       
        if (Auth::user()->profile == "dr") {
          
            return view(
                'back-office.pages.rapport.index',[
                'regions'=>Region::where('uuid', Auth::user()->region_id)->orderBy('libelle', 'asc')->get(),
                'uuid'=> $uuid
            ]);
        } elseif (Auth::user()->profile == "dp") {
            $m =Demande::where('province_id', Auth::user()->province_id)->where('session_id', $uuid)->where('genre','=','M')->get()->count();
            $f =Demande::where('province_id', Auth::user()->province_id)->where('session_id', $uuid)->where('genre','=','F')->get()->count();
           
            $m1 =Demande::where('province_id', Auth::user()->province_id)->where('session_id', $uuid)->where('genre','=','M')->where('status_demande', '!=', 'null')->get()->count();
            $f1 =Demande::where('province_id', Auth::user()->province_id)->where('session_id', $uuid)->where('genre','=','F')->where('status_demande', '!=', 'null')->get()->count();
           
            $codem =Demande::where('province_id', Auth::user()->province_id)->where('session_id', $uuid)->where('genre','=','M')->where('code_status', '=', '1')->where('status_demande', '!=', 'null')->get()->count();
            $codef =Demande::where('province_id', Auth::user()->province_id)->where('session_id', $uuid)->where('genre','=','F')->where('code_status', '=', '1')->where('status_demande', '!=', 'null')->get()->count();
           
            $creneaum =Demande::where('province_id', Auth::user()->province_id)->where('session_id', $uuid)->where('genre','=','M')->where('creneau_status', '=', '1')->where('status_demande', '!=', 'null')->get()->count();
            $creneauf =Demande::where('province_id', Auth::user()->province_id)->where('session_id', $uuid)->where('genre','=','F')->where('creneau_status', '=', '1')->where('status_demande', '!=', 'null')->get()->count();
           
            $permism =Demande::where('province_id', Auth::user()->province_id)->where('session_id', $uuid)->where('genre','=','M')->where('conduite_status', '=', '1')->where('status_demande', '!=', 'null')->get()->count();
            $permisf =Demande::where('province_id', Auth::user()->province_id)->where('session_id', $uuid)->where('genre','=','F')->where('conduite_status', '=', '1')->where('status_demande', '!=', 'null')->get()->count();
            $abandonm =Demande::where('province_id', Auth::user()->province_id)->where('session_id', $uuid)->where('genre','=','M')->where('abandon_status', '=', '1')->where('status_demande', '!=', 'null')->get()->count();
            $abandonf =Demande::where('province_id', Auth::user()->province_id)->where('session_id', $uuid)->where('genre','=','F')->where('abandon_status', '=', '1')->where('status_demande', '!=', 'null')->get()->count();
           
            return view(
                'back-office.pages.rapport.indexp',[
               
                'm'=>$m,
                'f'=>$f,
                'm1'=>$m1,
                'f1'=>$f1,
                'codem'=>$codem,
                'codef'=>$codef,
                'creneaum'=>$creneaum,
                'creneauf'=>$creneauf,
                'permism'=>$permism,
                'permisf'=>$permisf,
                'abandonm'=>$abandonm,
                'abandonf'=>$abandonf,
                'uuid'=> $uuid
            ]);
        }elseif (Auth::user()->profile == "auto-ecole") {
            
            $m =Demande::where('transfere_autoecole_id', Auth::user()->ecole_id)->where('session_id', $uuid)->where('genre','=','M')->where('status_demande', '!=', 'null')->get()->count();
            
            $f =Demande::where('transfere_autoecole_id', Auth::user()->ecole_id)->where('session_id', $uuid)->where('genre','=','F')->where('status_demande', '!=', 'null')->get()->count();
         
            $m1 =Demande::where('transfere_autoecole_id', Auth::user()->ecole_id)->where('session_id', $uuid)->where('genre','=','M')->where('status_demande',  'selectionne')->get()->count();
            $f1 =Demande::where('transfere_autoecole_id', Auth::user()->ecole_id)->where('session_id', $uuid)->where('genre','=','F')->where('status_demande',  'selectionne')->get()->count();
           
            $codem =Demande::where('transfere_autoecole_id', Auth::user()->ecole_id)->where('session_id', $uuid)->where('genre','=','M')->where('code_status', '=', '1')->get()->count();
            $codef =Demande::where('transfere_autoecole_id', Auth::user()->ecole_id)->where('session_id', $uuid)->where('genre','=','F')->where('code_status', '=', '1')->get()->count();
           
            $creneaum =Demande::where('transfere_autoecole_id', Auth::user()->ecole_id)->where('session_id', $uuid)->where('genre','=','M')->where('creneau_status', '=', '1')->get()->count();
            $creneauf =Demande::where('transfere_autoecole_id', Auth::user()->ecole_id)->where('session_id', $uuid)->where('genre','=','F')->where('creneau_status', '=', '1')->get()->count();
           
            $permism =Demande::where('transfere_autoecole_id', Auth::user()->ecole_id)->where('session_id', $uuid)->where('genre','=','M')->where('conduite_status', '=', '1')->get()->count();
            $permisf =Demande::where('transfere_autoecole_id', Auth::user()->ecole_id)->where('session_id', $uuid)->where('genre','=','F')->where('conduite_status', '=', '1')->get()->count();
            $abandonm =Demande::where('transfere_autoecole_id', Auth::user()->ecole_id)->where('session_id', $uuid)->where('genre','=','M')->where('abandon_status', '=', '1')->get()->count();
            $abandonf =Demande::where('transfere_autoecole_id', Auth::user()->ecole_id)->where('session_id', $uuid)->where('genre','=','F')->where('abandon_status', '=', '1')->get()->count();
           
            return view(
                'back-office.pages.rapport.indexp',[
               
                'm'=>$m,
                'f'=>$f,
                'm1'=>$m1,
                'f1'=>$f1,
                'codem'=>$codem,
                'codef'=>$codef,
                'creneaum'=>$creneaum,
                'creneauf'=>$creneauf,
                'permism'=>$permism,
                'permisf'=>$permisf,
                'abandonm'=>$abandonm,
                'abandonf'=>$abandonf,
                'uuid'=> $uuid
            ]);
        }else {
            return view(
                'back-office.pages.rapport.index',[
                'regions'=>Region::orderBy('libelle', 'asc')->get(),
                'uuid'=> $uuid
            ]); 
        }
        
       
    }

    public function resultat()
    {
       
        if(Route::getCurrentRoute()->getName()=='resultat-code'){
            return view('back-office.pages.candidatures.resultat', [
                'demandes' => Demande::where('code_status', '=', '1')->get(),
            ]);
        }elseif(Route::getCurrentRoute()->getName()=='resultat-creneau'){
            return view('back-office.pages.candidatures.resultat', [
                'demandes' => Demande::where('creneau_status', '=', '1')->get(),
            ]);
        }else{
            return view('back-office.pages.candidatures.resultat', [
                'demandes' => Demande::where('permis_status', '=', '1')->get(),
            ]);
        }
        
        // if (condition) {
        //     # code...
        // } else {
        //     # code...
        // }
        
    }
}
