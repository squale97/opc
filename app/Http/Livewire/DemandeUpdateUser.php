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
// use Livewire\Component;

class DemandeUpdateUser extends Component
{
    
    use WithFileUploads;
   
    public $demande;
    public $document;
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

    public $typeFormation;
    public $permisfile;

    public function render()
    {
        
        return view('livewire.demande-update-user');
    }

    public function mount() {
     
        $this->regions = Region::orderBy('libelle', 'asc')->get();
        $this->formations = Formation::all();
        $this->session = Session::orderBy('created_at','desc')->first();
        

        $this->uuid              = $this->demande->uuid;
        $this->nom              = $this->demande->nom;
        $this->prenom           = $this->demande->prenom;
        $this->genre            = $this->demande->genre;
        $this->datenaissance    = $this->demande->datenaissance;
        $this->lieunaissance    = $this->demande->lieunaissance;
        $this->type            = $this->demande->typepiece;
        $this->refidentite     = $this->demande->reference;
        $this->telephone      = $this->demande->telephone;
        $this->email         = $this->demande->email;
        $this->nom_personne  = $this->demande->nom_personne;
        $this->tel_personne  = $this->demande->tel_personne;
        $this->habitation= $this->demande->residence;
        $this->formation= $this->demande->typeformation_id;
        $this->niveau= $this->demande->niveauformation_id;
        $this->niveaux = Niveau::where('formation_id', $this->demande->typeformation_id)->get();
        $this->diplome= $this->demande->diplome_id;
        $this->diplomes = Diplome::where('niveau_id', $this->demande->niveauformation_id)->get();
        $this->qualification= $this->demande->qualification;
        $this->occupation= $this->demande->occupation; 
        $this->permis= $this->demande->permis;
        $this->langue= $this->demande->langue;
        $this->region= $this->demande->region_id;
        $this->provinces= $this->demande->province_id;
        $this->province = Province::where('region_id', $this->demande->region_id)->get();

        $this->communes= $this->demande->commune_id;
        $this->commune = Commune::where('province_id', $this->demande->province_id)->get();
        $this->arrondissements= $this->demande->arrondissement_id;
        $this->arrondissement = Arrondissement::where('commune_id', $this->demande->commune_id)->get();

        $this->secteurs= $this->demande->secteur_id;
        $this->villages= $this->demande->village_id;
        $this->secteur = Secteur::where('commune_id', $this->demande->commune_id)->get();
        $this->village = Village::where('commune_id', $this->demande->commune_id)->get();

        // $this->photo = $this->demande->photo;
        // $this->cnibfile = $this->demande->document->cnibfile;
        // $this->diplomefile = $this->demande->diplomefile;
    }

    public function updatedRegion($value) {       
        $this->province = Province::where('region_id', $value)->get();
    }

    public function updatedProvinces($value) {
      
        $this->commune = Commune::where('province_id', $value)->get();
    }
    public function updatedCommunes($value) {
      $this->commune_statut =Commune::where('uuid', $value)->first()->statut;
        
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
      
        $this->diplomes = Diplome::where('niveau_id', $value)->get();
    }

    public function updateDemande() {

        $fieldRule = [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'datenaissance' => 'required|string',
            'lieunaissance' => 'nullable|string',
            'niveau' => 'nullable|string',
            'classe' => 'nullable|string',
            'diplome' => 'nullable|string',
            'qualification' => 'nullable|string',
            'type' => 'required|string',
            'refidentite' => 'required|string|unique:demandes',
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
        ];
        // dump($this->nom);
        // dump($this->prenom);
        // dump($this->datenaissance);
        // dump($this->genre);
     
       
        
        $demande                     = $this->demande;
        $demande->nom         =        $this->nom;
        $demande->prenom         =     $this->prenom;
        $demande->genre              = $this->genre;
        $demande->datenaissance      = $this->datenaissance;
        $demande->lieunaissance      = $this->lieunaissance;
        $demande->typepiece          = $this->type;
        $demande->reference          = $this->refidentite;
        $demande->telephone          = $this->telephone;
        $demande->email              = $this->email;
        $demande->nom_personne       = $this->nom_personne;
        $demande->tel_personne       = $this->tel_personne;
        $demande->residence          = $this->habitation;
        $demande->typeformation_id       = $this->formation;
        $demande->niveauformation_id          = $this->niveau;
        // $demande->classe             = $this->classe;
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
        $demande->save();

        $document                     = $this->demande->document;
        if (isset($this->photo) || isset($this->permisfile) || isset($this->cnibfile) || isset($this->diplomefile)) {
            
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
        
        $document->save();
    }
    return redirect()->route('listedemande')->with('success', 'Demande modifiée avec succes');
       }
}
