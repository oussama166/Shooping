<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ville;
use Hash;

class Clientbackendcontroller extends Controller
{
    public function clients()
    {
        $clients = User::simplePaginate(5);
        return view('admin.clients')->with('clients',$clients);
    }
    public function inscriptionclient()
    {
        return view('client.registration-client');
    }
    public function registrationclient(Request $request)
    { 
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'datenaissance' => 'required',
            'num' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
         User::create([
        'nom' => $data['nom'],
        'prenom' => $data['prenom'],
        'datenaissance' => $data['datenaissance'],
        'num' => $data['num'],
        'email' => $data['email'],
        'validadmin' => 'client',
        'password' => Hash::make($data['password'])
        ]);
        return redirect("login");
    }
    public function deleteclient($id)
    {
        User::destroy($id);
        return redirect('clients');
    }

}
