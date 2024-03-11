<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salle;
use DB;
class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $now = date("Y-m-d");

        $db = DB::connection();
       
        $count = $db->table('contacts')
        ->whereDate('created_at', '=', $now)
        ->where('message', '=', null)
        ->count();

        $count_message = $db->table('contacts')
        ->whereDate('created_at', '=', $now)
        ->where('message', '!=', null)
        ->count();

        $salles = Salle::paginate(4);

        return view('admin.salles', ['salles'=>$salles, 'count'=>$count, 'count_message'=>$count_message]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'type_salle' => ['required', 'string'],
            'nbr_places' => ['required', 'integer'],
            'nom_faculte' => ['required']
            
        ]);

        $salle = new Salle;
        
        $salle->type_salle= $request->type_salle;
        $salle->nbr_places = $request->nbr_places;
        $salle->nom_faculte = $request->nom_faculte;


        $salle->save();

        return redirect()->back()->with('success', 'l\'utilisateur a été bien ajouté !!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $salle = Salle::find($id);
        return response()->json($salle);
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
        $request->validate([
            'type_salle' => ['required'],
            'nbr_places' => ['required'],
            'nom_faculte' => ['required']
        ]);

        $salle = Salle::find($id);

        $salle->type_salle = $request->type_salle;
        $salle->nbr_places = $request->nbr_places;
        $salle->nom_faculte = $request->nom_faculte;
        $salle->save();

        return redirect()->back()->with('success', 'l\'utilisateur a été bien edité !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Salle::destroy($id);
        return redirect()->back()->with('success', 'l\'utilisateur a été bien supprimé !!');
    }
}
