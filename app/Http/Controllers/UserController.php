<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('user.index',compact('users'));
    }
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $user = User::create([
                'user_name' => "test123",
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(10),
            ]);
            return response()->json([
                'data' => 'success'
            ]);
        }
        return view('user.create');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit',compact('user'));
    }
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $user = User::find($request->id);
            $user->password = Hash::make($request->password);
            $user->update();
            return response()->json([
                'data' => 'success'
            ]);
        }
    }
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $user = User::find($request->id);
            $user->delete();
            return response()->json([
                'data' => 'success'
            ]);
        }
    }
    
}
