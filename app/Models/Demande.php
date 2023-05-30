<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    use \App\Http\Traits\UsesUuid;
    protected $primaryKey = 'uuid';

    protected $fillable = [
        'nom',
        'prenom',
        'genre',
        'datenaissance',
        'lieunaissance',
        'typepiece',
        'reference',
        'telephone',
        'email',
        'nom_personne',
        'tel_personne',
        'residence',
        'typeformation_id',
        'niveauformation_id',
        'classe',
        'diplome_id',
        'qualification',
        'occupation',
        'permis',
        'langue',
        'code_status',
        'creneau_status',
        'conduite_status',
        'permis_status',
        'status_demande',
        'status_paiement',
        'user_id',
        'transfere_autoecole_id',
        'admin_transfere_autoecole_id',
        'region_id',
        'province_id',       
        'commune_id',       
        'secteur_id',       
        'arrondissement_id',       
        'village_id',       
        'session_id',       
    ];

    public function getDemandestatusAttribute()
    {
        if ($this->status_demande== 'rejete') {
            return "Demande rejetée";
        }elseif ($this->status_demande== 'preselectionne') {
            return "Demande preselectionnée";
        }elseif ($this->status_demande== 'selectionne') {
            return "Demande selectionnée";
        }else {
            return "En cours de traitement";
        }
    }
    public function region()
    {
        return $this->belongsTo(Region::class,  'region_id', 'uuid');
    }
    public function province()
    {
        return $this->belongsTo(Province::class,  'province_id', 'uuid');
    }
    public function commune()
    {
        return $this->belongsTo(Commune::class,  'commune_id', 'uuid');
    }
    public function arrondissement()
    {
        return $this->belongsTo(Arrondissement::class,  'arrondissement_id', 'uuid');
    }
    public function secteur()
    {
        return $this->belongsTo(Secteur::class,  'secteur_id', 'uuid');
    }
    public function village()
    {
        return $this->belongsTo(Village::class,  'village_id', 'uuid');
    }
    
    public function formation()
    {
        return $this->belongsTo(Formation::class,  'typeformation_id', 'uuid');
    }
    public function niveau()
    {
        return $this->belongsTo(Niveau::class,  'niveauformation_id', 'uuid');
    }
    public function diplome()
    {
        return $this->belongsTo(Diplome::class,  'diplome_id', 'uuid');
    }
    public function session()
    {
        return $this->belongsTo(Session::class,  'session_id', 'uuid');
    }
  
   
   public function document()
   {
       return $this->hasOne(Document::class,  'demande_id', "uuid");
   }
   public function documents()
   {
    return $this->hasMany(Document::class, 'demande_id', 'uuid');
   }
  
   public function ecole()
   {
       return $this->belongsTo(EcoleRegion::class, 'transfere_autoecole_id', 'uuid');
   }
//    public function complements()
//    {
//        return $this->hasMany(Complement::class, 'uuid', 'uuid');
//    }
  
  public function complement()
  {
      return $this->hasOne(Complement::class, 'demande_id', 'uuid');
  }
  
}
