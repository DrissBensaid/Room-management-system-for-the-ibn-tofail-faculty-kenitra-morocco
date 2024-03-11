<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ValideMail;
use DateTime;
use DB;
class contactAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aujourdhui = date("Y-m-d ");
        $now = date("Y-m-d");
        $db = DB::connection();
       
        $contacts = $db->table('contacts')
        ->whereDate('created_at', '=', $aujourdhui)
        ->where('message', '=', null)
        ->paginate(5);

        $count = $db->table('contacts')
        ->whereDate('created_at', '=', $now)
        ->where('message', '=', null)
        ->count();
        $count_messages = $db->table('contacts')
        ->whereDate('created_at', '=', $now)
        ->where('message', '!=', null)
        ->count();
        
        return view('admin.contact',['contacts'=>$contacts, 'count'=>$count, 'count_messages'=>$count_messages]);
    }
    public function index_message()
    {
        $aujourdhui = date("Y-m-d ");
        $now = date("Y-m-d");
        $db = DB::connection();

        $contacts_message = $db->table('contacts')
        ->whereDate('created_at', '=', $aujourdhui)
        ->where('message', '!=', null)
        ->paginate(5);

        $count_messages = $db->table('contacts')
        ->whereDate('created_at', '=', $now)
        ->where('message', '!=', null)
        ->count();
        $count = $db->table('contacts')
        ->whereDate('created_at', '=', $now)
        ->where('message', '=', null)
        ->count();
        
        return view('admin.messages',['count'=>$count, 'contacts_message'=>$contacts_message, 'count_messages'=>$count_messages]);
    }


    public function ValideReservationEmailForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);
        // dd($request->email);
        $details = [
            'name' => 'administration de système réservation des salles',
            'email' => $request->email,
            'message' => 'nous avons validé votre reservation',
        ];
        
        
        Mail::to($request->email)->send(new ValideMail($details));
    
        
        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès.');
    }


    public function RefuseReservationEmailForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);
        // dd($request->email);
        $details = [
            'name' => 'administration de système réservation des salles',
            'email' => $request->email,
            'message' => 'Nous sommes désolés que cette salle ait été réservée',
        ];

        Mail::to($request->email)->send(new ValideMail($details));

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès.');
    }

    





    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
