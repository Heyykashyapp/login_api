<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
      
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
  
        $user = User::where('email', $request->email)->first();
 
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['status' => false, 'message' => 'Invalid credentials'], 401);
        }

        if ($user->active_token) {
            return response()->json(['status' => false, 'message' => 'Already logged in'], 403);
        }
    
        $token = bin2hex(random_bytes(32));
    
   
        $user->update(['active_token' => $token]);

        return response()->json(['status' => true, 'message' => 'Login successful', 'token' => $token], 200);
    }
    

    public function logout(Request $request)
    {
     
        $token = $request->token;
    
        if (!$token) {
            return response()->json(['status' => false, 'message' => 'Token not provided'], 400);
        }
    
   
        $user = User::where('active_token', $token)->first();
    
        if ($user) {
     
            $user->update(['active_token' => null]);
    
            return response()->json(['status' => true, 'message' => 'Logged out successfully'], 200);
        }
    
        return response()->json(['status' => false, 'message' => 'Invalid token'], 401);
    }
    
    
}
