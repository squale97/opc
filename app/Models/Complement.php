<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complement extends Model
{
    use HasFactory;
    use \App\Http\Traits\UsesUuid;
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'user_id ',
        'cnib',
        'extrait',
        'fiche_inscription',
        'engagement',
        'photo',
        'diplome',
        'permis',
    ];
}
