<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    use \App\Http\Traits\UsesUuid;
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'photo',
        'cnibfile',
        'diplomefile',
        'permisfile',
        'demande_id',   
    ];
    public function demande()
    {
        return $this->belongsTo(Demande::class,  'demande_id', 'uuid');
    }
}
