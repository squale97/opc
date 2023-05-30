<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;
    use \App\Http\Traits\UsesUuid;
    protected $primaryKey = 'uuid';
    public $fillable = ['libelle', 'formation_id'];
    public function formations(){
        return $this->belongsTo(Formation::class, 'formation_id', 'uuid');
    }
}
