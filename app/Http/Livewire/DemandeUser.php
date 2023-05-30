<?php

namespace App\Http\Livewire;

use App\Models\Arrondissement;
use App\Models\Commune;
use App\Models\Demande;
use App\Models\Document;
use App\Models\Diplome;
use App\Models\Formation;
use App\Models\Niveau;
use App\Models\Province;
use App\Models\Region;
use App\Models\Secteur;
use App\Models\Session;
use App\Models\Village;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class DemandeUser extends Component
{
    use WithFileUploads;
    
    public $lademande;
    public $demande;
    public $formation;
    public $regions;
    public $region;
    public $provinces;
    public $province;
    public $commune;
    public $communes;
    public $arrondissement;
    public $arrondissements;
    public $secteur;
    public $village;
    public $session;
    public $commune_statut;
    public $formations;
    public $nom;
    public $prenom;
    public $genre;
    public $datenaissance;
    public $lieunaissance;
    public $type;
    public $refidentite;
    public $telephone;
    public $niveau;
    public $email;
    public $nom_personne;
    public $tel_personne;
    public $classe;
    public $qualification;
    public $diplome;
    public $diplomes;
    public $habitation;
    public $occupation;
    public $langue;
    public $secteurs;
    public $villages;
    public $permis;
  
    public $cnibfile;
    public $diplomefile;
    public $photo;

    public $niveaux;
    public $datedelivrance;

    public $typeFormation;
    public $permisfile;
    public $typeniveau;
    public $status_paiement;

    protected  $rules = [
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'datenaissance' => 'required|string',
        'lieunaissance' => 'required|string',
        'niveau' => 'nullable|string',
        'classe' => 'nullable|string',
        'diplome' => 'nullable|string',
        'qualification' => 'nullable|string',
        'type' => 'required|string',
        'datedelivrance' => 'required|string',
        'telephone' => 'required|string',
        'email' => 'required|string',
        'nom_personne' => 'required|string',
        'tel_personne' => 'required|string',
        'habitation' => 'required|string',
        'occupation' => 'required|string',
        'langue' => 'required|string',
        'region' => 'required|string',
        'provinces' => 'required|string',       
        'communes' => 'required|string',       
        'arrondissements' => 'string|nullable',       
        'secteurs' => 'string|nullable',       
        'villages' => 'string|nullable',       
        'cnibfile' => 'required',       
        'diplomefile' => 'nullable',             
        'photo' => 'nullable',
    ];
    public function render()
    {
        return view('livewire.demande-user');
    }

    public function mount() {
        $this->demande = new Demande();
        $this->regions = Region::orderBy('libelle', 'asc')->get();
        $this->formations = Formation::all();
        $this->session = Session::orderBy('created_at','desc')->first();

      

    }

    public function updatedRegion($value) {       
        $this->province = Province::where('region_id', $value)->get();
    }

    public function updatedProvinces($value) {
      
        $this->commune = Commune::where('province_id', $value)->get();
    }
    public function updatedCommunes($value) {
      $this->commune_statut =Commune::where('uuid', $value)->first()->statut;
        // dd($this->commune_statut);
        if ($this->commune_statut ==true) {
            $this->arrondissement = Arrondissement::where('commune_id', $value)->get();
        } else {
            $this->secteur = Secteur::where('commune_id', $value)->get();
            $this->village = Village::where('commune_id', $value)->get();
        }
    }
    public function updatedFormation($value) {
        $this->typeFormation = Formation::where('uuid', $value)->first()->libelle;
        $this->niveaux = Niveau::where('formation_id', $value)->get();
    }
    public function updatedNiveau($value) {
        $this->typeniveau = Niveau::where('uuid', $value)->first()->libelle;
        $this->diplomes = Diplome::where('niveau_id', $value)->get();
        
    }

    public function saveDemande() {
      
        
       
        $this->validate();
        $demand = Demande::count() +1;
        $varr = '___00';
         $numero = Carbon::parse($this->session->date_ouverture)->format('Y').''.$varr.''.$demand;
        $dem = Demande::where('reference', $this->refidentite)->where('session_id',Session::where('uuid', $this->session->uuid)->first()->uuid)->get();
        $datenais =  Carbon::parse( $this->datenaissance)->format('Y');
        $datej =  Carbon::parse(Now())->format('Y');
        $datediff = $datej - $datenais;
        if ($dem->count() == 0) {
            if ($datediff <18 || $datediff > 45) {
                return redirect()->route('adddemande')->with('danger', 'L\'age minimun pour l\'OPC est de 18 ans et l\'age maximal est de 45 ans.');

            } else {
                $demande                     = new Demande();
            $demande->nom         =        $this->nom;
            $demande->prenom         =     $this->prenom;
            $demande->genre              = $this->genre;
            $demande->datenaissance      = $this->datenaissance;
            $demande->lieunaissance      = $this->lieunaissance;
            $demande->typepiece          = $this->type;
            $demande->reference          = $this->refidentite;
            $demande->datedelivrance     = $this->datedelivrance;
            $demande->telephone          = $this->telephone;
            $demande->email              = $this->email;
            $demande->nom_personne       = $this->nom_personne;
            $demande->tel_personne       = $this->tel_personne;
            $demande->residence          = $this->habitation;
            $demande->typeformation_id       = $this->formation;
            $demande->niveauformation_id          = $this->niveau;
            $demande->numero             = $numero;
            $demande->diplome_id            = $this->diplome;
            $demande->qualification      = $this->qualification;
            $demande->occupation         = $this->occupation;
            $demande->permis             = $this->permis;
            $demande->langue             = $this->langue;
            $demande->user_id            = Auth::user()->id;
            $demande->region_id          = $this->region;
            $demande->session_id          = $this->session->uuid;
            $demande->province_id        = $this->provinces;
            $demande->commune_id        = $this->communes;
            $demande->arrondissement_id        = $this->arrondissements;
            $demande->secteur_id        = $this->secteurs;
            $demande->village_id        = $this->villages;
            /* Desactivation du paiement*/ 
            $demande->status_paiement        = true;
            $demande->save();
    
            $document                     = new Document();
            if (isset($this->photo)) {
                $document->photo = $this->photo->store('document', 'public');  
            }
            if (isset($this->permisfile)) {
                
                $document->permisfile= $this->permisfile->store('document', 'public');  
            }
            if (isset($this->cnibfile)) {
    
                $document->cnibfile = $this->cnibfile->store('document', 'public');  
            }
            if (isset($this->diplomefile)) {
            
                $document->diplomefile = $this->cnibfile->store('document', 'public');  
            }
            
            $document->demande_id         = $demande->uuid;
            $document->save();
            return redirect()->route('listedemande')->with('success', 'Votre demande d\'inscription à l\'OPC a été soumise avec succès.');
            }
            
           
        } else {
            return redirect()->route('adddemande')->with('danger', 'Le numéro CNIB saisi a déjà été  utilisé pour effectuer une inscription pour cette session.');
            
        }
        
        
     }
}
