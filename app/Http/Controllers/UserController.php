<?php

namespace App\Http\Controllers;

use \App\User;
use \App\Models\Agent;
use \App\Models\Caisse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Flashy;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUser()
    {
        $statutCaisse = Caisse::select('etat')->first();
        $agents = Agent::all();
        $users = DB::table('users')->join('agents', 'users.agent_id', 'agents.id')
                                    ->select('users.*', 'agents.nom', 'agents.prenom')
                                    ->orderBy('id', 'DESC')->get();
        return view('parametres.utilisateurs', compact('statutCaisse', 'agents', 'users'));
    }

    public function storeUser(Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'agent_id' => ['required', 'numeric'],
            'role' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $agent = Agent::find($data['agent_id']);
        $checkUser = User::where('email', $agent->email)->get();
        if ($checkUser->count() > 0) {
            return redirect()->back()->with('info', 'Cet utilisateur existe dédà!');
        } else {
            $email = $agent->email;
        }
        User::create([
            'username' => $data['username'],
            'agent_id' => $data['agent_id'],
            'role' => $data['role'],
            'email' => $email,
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->back()->with('success', 'L\'agent a bien été défini comme utilisateur!');
    }
}
