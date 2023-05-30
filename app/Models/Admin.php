<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admin';
    use \App\Http\Traits\UsesUuid;
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'nom',
        'prenom',
        'numero',
        'profile',
        'email',
        'password',
        'region_id',
        'province_id',
        'profession',
        'photo',
        'ecole_id',
       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getProfilAttribute()
    {
        if ($this->profile== 'dr') {
            return "Direction Regionale";
        }elseif ($this->profile== 'dp') {
            return "Direction provinciale";
        }elseif ($this->profile== 'auto-ecole') {
            return "Auto écoles";
        }else 
        {
            return "Administrateur";
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
    public function ecole()
    {
        return $this->belongsTo(EcoleRegion::class,  'ecole_id', 'uuid');
    }

}
