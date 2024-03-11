<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;
    
    protected $fillable = ['semestre' , 'capacite' , 'filiere_id'];

    public function filiere(): BelongsTo
    {
        return $this->belongsTo(Filiere::class , 'filiere_id' , 'id');
    }

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }
}
