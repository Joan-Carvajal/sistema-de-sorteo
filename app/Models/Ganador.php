<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ganador extends Model
{
    protected $table = 'ganadores';
    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'fecha_sorteo',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
