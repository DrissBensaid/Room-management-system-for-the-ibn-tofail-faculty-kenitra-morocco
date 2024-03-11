<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\User;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'message',
        'expediteur_id',
        'distinataire_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
