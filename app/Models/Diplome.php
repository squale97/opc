<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
    use HasFactory;
    use \App\Http\Traits\UsesUuid;
    protected $primaryKey = 'uuid';
    public $fillable = ['libelle', 'niveau_id'];
    public function niveau(){
        return $this->belongsTo(Niveau::class, 'niveau_id', 'uuid');
    }
}
