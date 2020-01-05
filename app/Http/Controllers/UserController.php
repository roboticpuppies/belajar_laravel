<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function store(Request $data)
    {
        User::create([
            'name' => $data->name,
            'email' => $data->email,
            'no_hp' => $data->no_hp,
            'role' => $data->role,
            'password' => Hash::make($data->password),
        ]);
        return redirect('/admin/users')->with('status', 'Sukses!');
    }

    public function delete($id){
        $users = User::find($id);
        $users->delete();
        return redirect('/admin/users')->with('status', 'Sukses!');
    }
}
