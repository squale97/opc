<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    use HasFactory;

    public $fillable = ['montant_payement', 'compte_marchand', 'ministere', 'direction','username','password'];
}