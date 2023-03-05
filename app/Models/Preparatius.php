<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparatius extends Model
{
    use HasFactory;
    protected $table = 'preparatius';

    protected $fillable = ['nom', 'descripcio', 'imatges_id'];
}
