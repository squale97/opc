<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    use \App\Http\Traits\UsesUuid;
    protected $primaryKey = 'uuid';
    public $fillable = ['libelle', 'province_id','statut'];
    public function provinces(){
        return $this->belongsTo(Province::class, 'province_id', 'uuid');
    }
}
