<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curricula';
    protected $casts = [
    'fecha_nacimiento' => 'date',
    ];
    protected $fillable = [
    'nombre',
    'apellidos',
    'telefono',
    'correo',
    'nota_media',
    'experiencia',
    'formacion',
    'habilidades',
    'fotografia',
];
}