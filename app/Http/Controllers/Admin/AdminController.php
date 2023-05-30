<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Demande;
use App\Models\Parametre;
use App\Models\Region;
use App\Models\Session;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use App\Models\EcoleRegion;

class AdminController extends Controller
{
    public function index()
    {
        
        if (Auth::user()->profile == 'dr') {
            return view('back-office.pages.dashboard', 
        [
            'demande'=>Demande::where('region_id', Auth::user()->region_id)->get(), 
            'uses'=>Demande::where('region_id' , Auth::user()->region_id)->get(), 
            'user'=>Admin::where('profile', '!=', 'auto-ecole')
                            ->where('region_id', Auth::user()->region_id)   
                            ->where('profile', '!=', 'admin')             
                            ->get(), 
            'ecole'=>EcoleRegion::where('region_id', Auth::user()->region_id)->get(),
            
            
        ]);
        } elseif (Auth::user()->profile == 'dp') {
            return view('back-office.pages.dashboard', 
            [
                'demande'=>Demande::where('province_id', Auth::user()->province_id)->get(), 
                'uses'=>Demande::where('province_id', Auth::user()->province_id)->get(), 
                'user'=>Admin::where('profile', '!=', 'auto-ecole')
                               ->where('province_id', Auth::user()->province_id)
                               ->get(), 
                               'ecole'=>EcoleRegion::where('region_id', Auth::user()->region_id)->get(),
                
            ]);
        } elseif (Auth::user()->profile == 'auto-ecole') {
            return view('back-office.pages.dashboard', 
            [
                'demande'=>Demande::where('transfere_autoecole_id', Auth::user()->ecole_id)->get(), 
                'uses'=>Demande::where('transfere_autoecole_id', Auth::user()->ecole_id)->get(), 
                'user'=>Admin::where('profile', '=', 'auto-ecole')->where('profile', '!=', 'admin')->get(), 
                'ecole'=>EcoleRegion::all(),
                
            ]);
        }else{
            return view('back-office.pages.dashboard', 
            [
                'demande'=>Demande::all(), 
                'user'=>Admin::where('profile', '!=', 'admin')->where('profile', '!=', 'auto-ecole')->get(), 
                'ecole'=>EcoleRegion::all(),
                'session'=>Session::all(),
                'uses' => Admin::where('profile', '!=', 'admin')->where('profile', '!=', 'auto-ecole')->get()
            ]);
        }
        
        
    }

    public function generepassword($uuid)
    {
      //  $output = new \Symfony\Component\ConsoleOutput\ConsoleOutput();
        $pasword = Str::random(8);
        echo('mot de passe');
        echo($pasword);
        $user = Admin::where('uuid', $uuid)->first();
        $user->password = Hash::make($pasword);
        $user->save();
        //$output->writln($password);
       // echo($pasword);
       // try {
            Mail::send('front-office.partials.MailTouser',
            [
                'user' => $user,
                'parametre'=> Parametre::first(), 
                'nom' => $user->nom,  
                'pasword' => $pasword], function ($message) use ($user, $pasword) {
               $message->from(\Config::get('mail.from.address'), 'INSCRIPTION A L’OPERATION PERMIS DE CONDUIRE (OPC)');
   
               $message->to($user['email']);
               $message->subject('Création de compte auto école');
            });
        //} catch (\Throwable $th) {
            //return redirect()->route('showusers', $user->uuid)->with('warning', 'Mot de passe non envoyé veuillez regenerer !');
       // }
        return redirect()->route('addusers')->with('success', 'Mot de passe généré avec succes');
    }
    public function utilisateur()
    {
        return view('back-office.pages.utilisateurs.index', ['users' => Admin::where('profile', '!=', 'admin')->where('profile', '!=', 'auto-ecole')->orderBy('created_at', 'desc')->get()]);
    }
    public function create()
    {
        $region = Region::orderBy('libelle', 'asc')->get();
        $province = Province::orderBy('libelle', 'asc')->get();
        return view('back-office.pages.utilisateurs.create', [
            'users'=> Admin::where('uuid', '!=', Auth::user()->uuid)->where('profile', '!=', 'admin')->where('profile', '!=', 'auto-ecole')->orderBy('created_at', 'desc')->take(8)->get(),'user'=>new Admin(),'titre' => 'Nouveau utilisateur', 'break' => 'Ajouter utilisateur', 'province' => $province, 'region' => $region]);
    }
    public function store(Request $request)
    {
        $pasword = Str::random(8);
        if (Auth::user()->profile == "admin") {
            $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'numero' => 'required|string|max:255',
                'profile' => 'required|string|max:255',
                'email' => 'required|string|max:255|unique:admins',
                'paysId' => 'required',
                'villeId' => 'required',
                'profession' => 'required|string|max:255',
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
            $user = Admin::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'profession' => $request->profession,
                'profile' => $request->profile,
                'numero' => $request->numero,
                'region_id' => $request->paysId,
                'province_id' => $request->villeId,
                'photo' => $file,
                'password' => Hash::make($pasword),
                'active'=>$desactiver,
            ]);
          
            if ($user) {
               try {
                Mail::send('front-office.partials.MailTouser', [
                    'user' => $user, 
                    'parametre'=> Parametre::first(),
                    'nom' => $user->nom.' '.$user->prenom,
                      'pasword' => $pasword], function ($message) use ($user, $pasword) {
                    $message->from(\Config::get('mail.from.address'), 'INSCRIPTION A L’OPERATION PERMIS DE CONDUIRE (OPC)');
                    
                    $message->to($user['email']);
                    $message->subject('Création de compte');
                });
               } catch (\Throwable $th) {
                 return redirect()->route('showusers', $user->uuid)->with('warning', 'Mot de passe non envoyé veuillez regenerer !');
                   
               }
               

                return redirect()->route('addusers')->with('success', 'Utilisateur créé avec succès');
            } else {
            }
        } else {
           
        }
    }

    public function show(Request $request, $uuid)
    {
        return view(
            'back-office.pages.utilisateurs.profile',
            [
                
                'user' => Admin::where('uuid', $uuid)->first(),
                'titre' => Admin::where('uuid', $uuid)->first()->nom." ". Admin::where('uuid', $uuid)->first()->prenom,
                'break' => Admin::where('uuid', $uuid)->first()->nom . ' ' . Admin::where('uuid', $uuid)->first()->prenom,
            ]
        );
    }
    public function edit($uuid){
        
        $region = Region::orderBy('libelle', 'asc')->get();
        $province = Province::orderBy('libelle', 'asc')->get();
        return view('back-office.pages.utilisateurs.edit', ['users'=> Admin::where('uuid', '!=', Auth::user()->uuid)->orderBy('created_at', 'desc')->get(),'user'=> Admin::where('uuid', $uuid)->first(),'titre' => 'Edition de mon compte', 'break' =>Admin::where('uuid', $uuid)->first()->nom , 'province' => $province, 'region' => $region]);
    }
    
    public function update(Request $request, $uuid){
           
            if ($request->file('photo') != null) {
                $file = $request->file('photo')->store('users', 'public');  
            }else {
                $file = Auth::user()->photo;
            }
            if (isset($request->revoquer)) {
                $desactiver = $request->revoquer;
            }
            else{
                $desactiver =false;
            }
           
            if(Auth::user()->profile =='admin'){

                $request->validate([
                    'nom' => 'required|string|max:255',
                    'prenom' => 'required|string|max:255',
                    'numero' => 'required|string|max:255',
                    'email' => 'required|string|max:255',
                    'profession' => 'required|string|max:255',
                    
                ]);

                    $user = Auth::user();

                    $user->nom = $request->nom;
                    $user->prenom = $request->prenom;
                    $user->email = $request->email;
                    $user->profession = $request->profession;
                    $user->numero = $request->numero;
                    $user->photo = $file;
                    $user->save();
               return redirect()->route('edit-user', $user->uuid)->with('success', 'Administrateur créer avec succes');

            }else{
                $request->validate([
                        'nom' => 'required|string|max:255',
                        'prenom' => 'required|string|max:255',
                        'numero' => 'required|string|max:255',
                        'email' => 'required|string|max:255',
                        'profession' => 'required|string|max:255',
                        
                    ]);

                $user = Auth::user();
                $user->nom = $request->nom;
                $user->prenom = $request->prenom;
                $user->email = $request->email;
                $user->profession = $request->profession;
                $user->numero = $request->numero;
                $user->photo = $file;
                  
                $user->save();
                return redirect()->route('edit-user', $user->uuid)->with('success', 'Administrateur créer avec succes');
            }            
           
                // return redirect()->route('users');
                // Mail::send('admin.users.mailToUser', ['user' => $user, 'nom' => $user->nom, 'prenom' => $user->prenom,  'pasword' => $pasword], function ($message) use ($user, $pasword) {
                //     $message->from('us@example.com', 'INSCRIPTION A L’OPERATION PERMIS DE CONDUIRE (OPC)');

                //     $message->to($user['email']);
                //     $message->subject('Création de compte');
                // });

                
       
    }
    public function updateUser(Request $request, $uuid){        
                     
                $request->validate([
                    'nom' => 'required|string|max:255',
                    'prenom' => 'required|string|max:255',
                    'numero' => 'required|string|max:255',
                    'profile' => 'required|string|max:255',
                    'email' => 'required|string|max:255',
                    'paysId' => 'required',
                    'villeId' => 'required',
                    'profession' => 'required|string|max:255',
                    
                ]);
                if ($request->file('photo') != null) {
                    $file = $request->file('photo')->store('users', 'public');  
                }else {
                    $file = Admin::where('uuid', $uuid)->first()->photo;
                }
                if (isset($request->revoquer)) {
                    $desactiver = $request->revoquer;
                }
                else{
                    $desactiver =false;
                }
                $user = Admin::where('uuid', $uuid)->first()->update([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'email' => $request->email,
                    'profession' => $request->profession,
                    'profile' => $request->profile,
                    'numero' => $request->numero,
                    'region_id' => $request->paysId,
                    'province_id' => $request->villeId,
                    'photo' => $file,
                    'active'=>$desactiver,
                ]);
                     
           
            return redirect()->route('edit-user', $user->uuid)->with('success', 'Administrateur créer avec succes');
               

                
       
    }
    public function updatepassword(Request $request, $uuid){
    
        $request->validate([

            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        
        $user =Admin::where('uuid', $uuid)->first();
  
        $pasword = $request->password;
        $user ->update([
            'password' => Hash::make($request->password),
        ]);
        try {
            Mail::send('front-office.partials.MailTouser', [
                'user' => $user, 
                'parametre'=> Parametre::first(),
                'nom' => $user->nom.' '.$user->prenom,
                  'pasword' => $pasword], function ($message) use ($user, $pasword) {
                $message->from(\Config::get('mail.from.address'), 'INSCRIPTION A L’OPERATION PERMIS DE CONDUIRE (OPC)');
                
                $message->to($user['email']);
                $message->subject('Modification de mot de passe');
            });
        } catch (\Throwable $th) {
            return redirect()->route('showusers', $user->uuid)->with('warning', 'Mot de passe non envoyé veuillez regenerer !');

        }
       
        return redirect()->route('edit-user', $uuid)->with('success', 'Mot de passe modifié avec succes');
    }

  public function parametre()
  {
      
     return view('back-office.pages.parametre.index',[
         'parametre'=>Parametre::all(),
     ]);
  }
  public function updateparametre(Request $request, $id)
  { 
      
        Parametre::findorfail($id)->update([
            'montant_payement'=>$request->montant_payement,
            'compte_marchand'=>$request->compte_marchand,
            'username' => $request->username,
            'password' =>$request->password,
            'ministere'=>$request->ministere,
            'direction'=>$request->direction,
        ]);
  
   
     
     return redirect()->route('parametre');
  }
 
  public function destroy($uuid)
  {
    
      if (Auth::user()->profile =="admin") {
        //   dd(Demande::where('admin_transfere_autoecole_id', $uuid)->first()== null);
    if(Demande::where('admin_transfere_autoecole_id', $uuid)->first()== null){

        admin::where('uuid',$uuid)->first()->delete();
        return redirect()->route('users')->with('success', 'Utilisateur supprimé avec succes');
    }else {
        
        return redirect()->route('users')->with('warning', 'Impossible de supprimer cet Utilisateur');
    }
      
  } else {
          return redirect()->route('users')->with('danger', 'impossible de supprimer cet utilisateur');
          # code...
      }
  }
}
