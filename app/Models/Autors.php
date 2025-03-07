<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autors extends Model
{
    protected $fillable = ['nombre'];

    public function libros()
    {
        return $this->belongsToMany(Libro::class, 'autor_libro');
    }
}
