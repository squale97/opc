<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcoleRegion extends Model
{
    use HasFactory;
    use \App\Http\Traits\UsesUuid;
    protected $primaryKey = 'uuid';

    public $fillable = ['ecole_id','region_id'];

    /**
     * Get the user that owns the EcoleRegion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ecoles()
    {
        return $this->belongsTo(EcoleUser::class, 'ecole_id', 'uuid');
    }
}
