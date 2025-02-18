<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    
    public function createUser(Request $request)
    {

        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()], 400);
        }

        // $user = User::create([
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password)
        //     'active_token' => null
        // ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'active_token' => null
        ]);

       

        return response()->json(['status' => true, 'message' => 'User created successfully'], 201);
    }
}
