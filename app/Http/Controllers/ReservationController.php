<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Salle;
use Illuminate\Http\Request;
use Auth;
use DateTime;
use Illuminate\Support\Facades\DB;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function creat($id)
    {
        $user = Auth::user();
        return view('user.createreservation',['user'=>$user, 'id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required'],
            'prenom' => ['required'],
            'date_reservation' => ['required'],
            'duree_par_heur' => ['required'],
            'heur_debut' => ['required'],
            'heur_fin' => ['required']
            
        ]);

        $date_reservation = $request->date_reservation;
        $heur_debut = $request->heur_debut;
        $all_reservation = Reservation::all();
        foreach ($all_reservation as $reservation) {
            if($reservation['salle_id'] == $request->id)
            {
                if($request->date_reservation == $reservation['date_reservation'])
                {
                    if( strtotime($reservation['heur_debut']) == strtotime($heur_debut)  )
                    {
                        return redirect()->back()->with('danger', 'La salle est réservée pour cette période !!');
                    }

                    $now = new DateTime($reservation['heur_debut']); 
                    $dt_fn = new DateTime($request->heur_fin);
                    $diff = $dt_fn->diff($now);
                    $minutesfin = $diff->i + $diff->h * 60;
    
                    $date_bt= new DateTime($reservation['heur_debut']); 
                    $date_fn = new DateTime($request->heur_debut);
                    $diff = $date_fn->diff($date_bt);
                    $minutesdebut = $diff->i + $diff->h * 60;
    
                    
                    if($minutesdebut < $request->duree_par_heur + 60  )
                    {
                        return redirect()->back()->with('danger', 'entre une réservation et réservation il y a une heure !!');
                        
                    }
                    if($minutesfin < $reservation['duree_par_heur'] + 60 )
                    {
                        return redirect()->back()->with('danger', 'entre une réservation et réservation il y a une heure !!');
                        
                    }
                }
                
            }
        }
        
        $reservation = new Reservation;
        
        $reservation->nom= $request->nom;
        $reservation->prenom= $request->prenom;
        $reservation->date_reservation = $request->date_reservation;
        $reservation->duree_par_heur = $request->duree_par_heur;
        $reservation->heur_debut = $request->heur_debut;
        $reservation->heur_fin = $request->heur_fin;
        $reservation->user_id = auth()->id();
        $reservation->salle_id = $request->id;



        $hr_debut = new DateTime($request->heur_debut); 
        $hr_fn = new DateTime($request->heur_fin);
        $diff = $hr_fn->diff($hr_debut);
        $minutes = $diff->i + $diff->h * 60;

        if($minutes < $request->duree_par_heur*60 || $minutes > $request->duree_par_heur*60)
        {
            return redirect()->back()->with('danger', 'tu as fait un erreur dans le durée !!');
            // return $minutes ;
        }

        if(strtotime($request->heur_fin) <= strtotime($request->heur_debut))
        {
            return redirect()->back()->with('danger', 'il y a une faute de durée corrigé votre date de fin !!');
        }

        $reservation->save();
        return redirect()->back()->with('success', 'la reservation a été bien ajouté !!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $db = DB::connection();

        $user = Auth::user();

        $reservations = Reservation::where('salle_id', $id)
        ->where('date_reservation','>=',now())->get();
        $reservationsnow = Reservation::where('salle_id', $id)
        ->where('date_reservation','=',now())->get();

        return view('user.reservationshow',['reservations'=>$reservations,'user'=>$user, 'id'=>$id, 'reservationsnow'=>$reservationsnow]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
