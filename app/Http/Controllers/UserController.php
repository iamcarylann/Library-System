<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $user = User::orderBy('id')->get();

        return view('user.index', ['users' => $user]);
    }
    
    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);
      
        User::create([
            'name'  => $request->name,
           'email'     => $request->email ,
           'phone' => $request->phone,
           'address' => $request->address,
           
          ]);
      
      
      
        return redirect('/users')->with('message', 'A new user has been added');
      }
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(User $user, Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        $user->update($request->all());
        return redirect('/users')->with('message', "$user->name has been updated.");
    }

    public function delete(User $user)
    {
        $user->delete();
        
        return redirect('/users')->with('message', "$user->name has been deleted successfully");
    }
}
