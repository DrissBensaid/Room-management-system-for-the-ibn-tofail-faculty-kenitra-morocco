<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use DB;
class UserController extends Controller
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

        $users = User::where('is_admin','!=',true)->paginate(4);

        return view('admin.users', ['users'=>$users, 'count'=>$count, 'count_message'=>$count_message]);
    }




    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required','max:10', 'min:10'],
            'poste' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            
        ]);

        $user = new User;
        
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->telephone = $request->telephone;
        $user->poste = $request->poste;
        $user->email = $request->email;
        $user->password = Hash::make($request->nom);

        $user->save();

        return redirect()->back()->with('success', 'l\'utilisateur a été bien ajouté !!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json($user);
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
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required','max:10', 'min:10'],
            'poste' => ['required']
        ]);

        $user = User::find($id);
        if($user->email == $request->email)
        {
            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->telephone = $request->telephone;
            $user->poste = $request->poste;
        }
        else
        {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);

            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->telephone = $request->telephone;
            $user->poste = $request->poste;
            $user->email = $request->email;
        }
        $user->save();

        return redirect()->back()->with('success', 'l\'utilisateur a été bien edité !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'l\'utilisateur a été bien supprimé !!');
    }


    
}
