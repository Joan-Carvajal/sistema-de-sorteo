<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ciudad extends Model
{
    protected $table = 'ciudades';
    
    protected $fillable=['nombre', 'departamento_id'];

    public $timestamps = false;

    public function departamento(): BelongsTo{
        return $this->belongsTo(Departamento::class);
    }
}
