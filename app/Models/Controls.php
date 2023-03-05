<?php

namespace App\Models;

use App\Models\Caminada;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controls extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'descripcio', 'distancia','coordenades'];
    public function caminades(){
        return $this->belongsToMany(Caminada::class, 'controls','caminada_id','controls_id');
    }
}
