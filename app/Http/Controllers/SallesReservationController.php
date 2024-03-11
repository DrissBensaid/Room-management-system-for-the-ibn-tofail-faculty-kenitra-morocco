<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salle;
use DB;
class SallesReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salles = Salle::paginate(6);

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

        return view('admin.reserver_salle', ['salles'=>$salles, 'count'=>$count, 'count_message'=>$count_message]);
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
