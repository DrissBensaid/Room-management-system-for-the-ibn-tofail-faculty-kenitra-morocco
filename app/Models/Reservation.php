<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\User;
use App\Http\Models\Salle;
class Reservation extends Model
{

    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date_reservation',
        'duree_par_heur',
        'heur_debut',
        'heur_fin',
        'user_id',
        'salle_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }
}
