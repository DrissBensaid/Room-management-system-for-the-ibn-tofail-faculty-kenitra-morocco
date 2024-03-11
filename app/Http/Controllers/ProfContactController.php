<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Mail\ContactMail;

use App\Models\Contact;
use DB;

use Auth;

class ProfContactController extends Controller
{
    public function showContactForm()
    {
        $user = Auth::user();
        return view('user.contact', ['user'=>$user]);
    }

    public function submitContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        $contact = new Contact;
        
        $contact->nom= $request->name;
        $contact->prenom= null;
        $contact->type_salle = null;
        $contact->date_reservation = null;
        $contact->duree_par_heur = null;
        $contact->heur_debut = null;
        $contact->heur_fin = null;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->distinataire_id = 1;
        $contact->expediteur_id = Auth::id();
        
        $contact->save();
        Mail::to('drissbensaid76@gmail.com')->send(new ContactMail($details));
        
        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès.');
    }

    public function reserver_contact_form(Request $request)
    {
        
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|max:255',
            'date_reservation' => 'required',
            'duree_par_heur' => 'required',
            'heur_debut' => 'required',
            'heur_fin' => 'required'
        ]);

        $db = DB::connection();
       
        $type_salle = $db->table('salles')
        ->where('id','=', $request->id)
        ->select('type_salle')->first();
        
        $contact = new Contact;
        
        $contact->nom= $request->nom;
        $contact->prenom = null;
        $contact->type_salle =$type_salle->type_salle;
        $contact->email= $request->email;
        $contact->date_reservation = $request->date_reservation;
        $contact->duree_par_heur = $request->duree_par_heur;
        $contact->heur_debut = $request->heur_debut;
        $contact->heur_fin = $request->heur_fin;
        $contact->message = null;
        $contact->distinataire_id = 1;
        $contact->expediteur_id = Auth::id();

        if(strtotime($contact->heur_fin) <= strtotime($contact->heur_debut))
        {
            return redirect()->back()
            ->with('danger', 'il y a une faute de durée corrigé votre date de fin !!');
        }

        $contact->save();
        return redirect()->back()
        ->with('success', 'attendre la réponse dans votre email !!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $db = DB::connection();

        $user = Auth::user();

        // $reservations = Reservation::where('salle_id', $id)
        // ->where('date_reservation','>=',now())->get();
        // $reservationsnow = Reservation::where('salle_id', $id)
        // ->where('date_reservation','=',now())->get();
        return redirect()->back()->with('success', 'attendre le réponse dans votre email.');
    }
}
