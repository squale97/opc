<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    use \App\Http\Traits\UsesUuid;
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'titre',
        'nombre_candidat',
        'date_ouverture',
        'date_fermeture',
        'condition',
             
    ];
}
