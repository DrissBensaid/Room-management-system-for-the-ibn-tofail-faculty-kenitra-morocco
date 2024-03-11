<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'moduleFr' , 
        'moduleAr' , 
        'capacite' , 
        'code',
        'semestre_id',

    ];

    public function semestre(): BelongsTo
    {
        return $this->belongsTo(Semestre::class , 'semestre_id' , 'id');
    }

    public function groupes(): HasMany
    {
        return $this->hasMany(Groupe::class);
    }
}
