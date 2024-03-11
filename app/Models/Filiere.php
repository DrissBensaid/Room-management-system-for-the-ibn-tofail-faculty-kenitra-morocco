<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;
    protected $fillable = ['filiereFr' , 'filiereAr' ];

    
    public function semestres(): HasMany
    {
        return $this->hasMany(Semestre::class);
    }
}
