<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    use HasFactory;
    use \App\Http\Traits\UsesUuid;
    protected $primaryKey = 'uuid';
    public $fillable = ['libelle', 'commune_id'];
    public function commune(){
        return $this->belongsTo(Commune::class, 'commune_id', 'uuid');
    }
}
