<?php

namespace App\Http\Controllers;

use App\Models\Arrondissement;
use App\Models\Commune;
use App\Models\Complement;
use App\Models\Demande;
use App\Models\Parametre;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Province;
use App\Models\Secteur;
use App\Models\Session;
use App\Models\Village;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('front-office.pages.accueil');
    }

   public function demandes(){
    $demandes = Demande::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
    $parametre = Parametre::first();

    return view('front-office.pages.demandes.index', compact('demandes','parametre'));
    // $demandes = Demande::where('user_id', Auth::user()->id)->get();
    //    return view('front-office.pages.demandes.create',['demande'=>new Demande(),'region'=> Region::orderBy('libelle', 'asc')->get(), 'province'=>Province::orderBy('libelle', 'asc')->get()]);
   }
   public function liste(){
       $demandes = Demande::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
       $parametre = Parametre::first();
       return view('front-office.pages.demandes.index', compact('demandes','parametre'));
   }
   public function createdemande(){
   
       return view('front-office.pages.demandes.create');
           
   }

   public function complement(Request $request, $uuid)
   {
      $complement = new Complement;
      if (isset($request->cnibfile)) {
        $complement->cnib = $request->cnibfile->store('complement', 'public');  
    }
    if (isset($request->fiche1file)) {
        
        $complement->fiche_inscription = $request->fiche1file->store('complement', 'public');  
    }
    if (isset($request->fichefile)) {

        $complement->engagement = $request->fichefile->store('complement', 'public');  
    }
    if (isset($request->diplomefile)) {
       
        $complement->diplome = $request->diplomefile->store('complement', 'public');  
    }
    if (isset($request->extraitfile)) {
       
        $complement->extrait = $request->extraitfile->store('complement', 'public');  
    }
    if (isset($request->photo)) {
       
        $complement->photo = $request->photo->store('complement', 'public');  
    }
    if (isset($request->permisfile)) {
       
        $complement->permis = $request->permisfile->store('complement', 'public');  
    }
    $complement->demande_id         = $uuid;

    $complement->save();
    return redirect()->route('recipice', $uuid)->with('success', 'Dossier completé  avec succes veuillez proceder au paiement');
   }
   
   public function storedemande(Request $request){
    
       $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'datenaissance' => 'required|string',
        'lieunaissance' => 'nullable|string',
        'type' => 'required|string',
        'refidentite' => 'required|string',
        'telephone' => 'required|string',
        'email' => 'required|string',
        'nom_personne' => 'required|string',
        'tel_personne' => 'required|string',
        'habitation' => 'required|string',
        'occupation' => 'required|string',
        'langue' => 'required|string',
        'paysId' => 'required|string',
        'villeId' => 'required|string',       
        'cnibfile' => 'required',       
        'diplomefile' => 'required',             
        'photo' => 'required',       

    ]);

 

    $demande                     = new Demande();
    $demande->nom         = $request->nom;
    $demande->prenom         = $request->prenom;
    $demande->genre              = $request->genre;
    $demande->datenaissance      = $request->datenaissance;
    $demande->lieunaissance      = $request->lieunaissance;
    $demande->typepiece          = $request->type;
    $demande->reference          = $request->refidentite;
    $demande->telephone          = $request->telephone;
    $demande->email              = $request->email;
    $demande->nom_personne       = $request->nom_personne;
    $demande->tel_personne       = $request->tel_personne;
    $demande->residence          = $request->habitation;
    $demande->typeformation      = $request->formation;
    $demande->niveauformation    = $request->niveau;
    $demande->classe             = $request->classe;
    $demande->diplome            = $request->diplome;
    $demande->qualification      = $request->qualification;
    $demande->occupation         = $request->occupation;
    $demande->permis             = $request->permis;
    $demande->langue             = $request->langue;
    $demande->user_id            = Auth::user()->id;
    $demande->region_id          = $request->paysId;
    $demande->session_id          = $request->session;
    $demande->province_id        = $request->villeId;
    $demande->status_paiement    = true;
    $demande->save();

    $document                     = new Document();
    if (isset($request->photo)) {
        $document->photo = $request->photo->store('document', 'public');  
    }
    if (isset($request->permisfile)) {
        
        $document->permisfile= $request->permisfile->store('document', 'public');  
    }
    if (isset($request->cnibfile)) {

        $document->cnibfile = $request->cnibfile->store('document', 'public');  
    }
    if (isset($request->diplomefile)) {
       
        $document->diplomefile = $request->cnibfile->store('document', 'public');  
    }
    
    $document->demande_id         = $demande->uuid;
    $document->save();
    return redirect()->route('listedemande')->with('success', 'Votre demande d\'inscription à l\OPC a été soumise avec succès');
   }
   public function showdemande($uuid){
      
       return view('front-office.pages.demandes.show', ['demande'=>Demande::where('uuid',$uuid)->first()]);
   }
   public function editdemande($uuid){
    
    $demande = Demande::where('uuid',$uuid)->first();
    return view('front-office.pages.demandes.edit', compact('demande'));
   }

   public function updatedemande(Request $request, $uuid){
     
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'datenaissance' => 'required|string',
        'lieunaissance' => 'required|string',
        'type' => 'required|string',
        'refidentite' => 'required|string',
        'telephone' => 'required|string',
        'email' => 'required|string',
        'nom_personne' => 'required|string',
        'tel_personne' => 'required|string',
        'habitation' => 'required|string',
        'formation' => 'required|string',
        'occupation' => 'required|string',
        'langue' => 'required|string',
        'paysId' => 'required|string',
        'villeId' => 'required|string',       
           

    ]);
    $demande                     =  Demande::where('uuid', $uuid)->where('user_id', Auth::user()->id)->first();
    $demande->nom                = $request->nom;
    $demande->prenom             = $request->prenom;
    $demande->genre              = $request->genre;
    $demande->datenaissance      = $request->datenaissance;
    $demande->lieunaissance      = $request->lieunaissance;
    $demande->typepiece          = $request->type;
    $demande->reference          = $request->refidentite;
    $demande->telephone          = $request->telephone;
    $demande->email              = $request->email;
    $demande->nom_personne       = $request->nom_personne;
    $demande->tel_personne       = $request->tel_personne;
    $demande->residence          = $request->habitation;
    $demande->typeformation      = $request->formation;
    $demande->niveauformation    = $request->niveau;
    $demande->classe             = $request->classe;
    $demande->diplome            = $request->diplome;
    $demande->qualification      = $request->qualification;
    $demande->occupation         = $request->occupation;
    $demande->permis             = $request->permis;
    $demande->langue             = $request->langue;
    $demande->user_id            = Auth::user()->id;
    $demande->region_id          = $request->paysId;
    $demande->province_id        = $request->villeId;
    $demande->save();

    $document                     =  Document::where('demande_id', $uuid)->first();
    if (isset($request->photo)) {
        $document->photo = $request->photo->store('document', 'public');  
    }
    if (isset($request->permisfile)) {
        
        $document->permisfile= $request->permisfile->store('document', 'public');  
    }
    if (isset($request->cnibfile)) {

        $document->cnibfile = $request->cnibfile->store('document', 'public');  
    }
    if (isset($request->diplomefile)) {
       
        $document->diplomefile = $request->cnibfile->store('document', 'public');  
    }
    
    $document->save();
    return redirect()->route('show-demande', $uuid);
   }
   public function deletedemande($uuid)
   {
      Demande::where('uuid',$uuid)->where('user_id', Auth::user()->id)->first()->document->delete();
        Demande::where('uuid',$uuid)->where('user_id', Auth::user()->id)->delete();
        return redirect()->route('listedemande')->with('success', 'La demande d\'inscription à l\'OPC a été supprimée avec succès.');
   }

   public function demandetraitement()   {
    
    $demandes = Demande::where('status_demande','!=', 'null')->where('user_id', Auth::user()->id)->get();
    return view('front-office.pages.demandes.index', compact('demandes'));

   }
   public function selectionnee()
   {
       return view('front-office.pages.demandes',[
           'session'=>Session::first(),
           'demandes'=>Demande::where('status_demande', 'selectionne')->get(),
       ]);
   }
}
