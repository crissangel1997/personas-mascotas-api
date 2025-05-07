<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'especie', 'raza', 'edad','imagen','persona_id'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
