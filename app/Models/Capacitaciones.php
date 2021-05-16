<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacitaciones extends Model
{
    use HasFactory;

    protected $table = 'capacitaciones';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titulo',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'estado'
    ];
}
