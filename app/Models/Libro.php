<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = ['titulo'];
    public function autors()
    {
        return $this->belongsToMany(Autors::class, 'autor_libro');
    }
}
