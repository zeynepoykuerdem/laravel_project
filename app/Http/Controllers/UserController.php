<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }
    public function update(Request $request,$id){
        $user=User::find($id);
        if(!$user){
            return response()->json(['message'=>'User not found'],404);

        }
        $data = $request->validate([
            'username' => 'sometimes|string|unique:users', 
            'email' => 'sometimes|email|unique:users',
            'password' => 'sometimes|string|min:6', 
        ]);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return response()->json(['message' => 'User updated successfully'], 200);
        return view('update');
    }
}
