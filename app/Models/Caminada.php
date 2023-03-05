<?php

namespace App\Models;

use App\Models\Controls;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caminada extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'descripcio', 'data_caminada','participants','caminada_numero','poblacio', 'direccio_inici', 'coordenades_inici', 'track_id', 'imatges_id','mapa_id', 'altimetria_id', 'triptic_id'];
    public function controls(){
        return $this->belongsToMany(Controls::class, 'controls','caminada_id','controls_id');
    }
    
}