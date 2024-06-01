<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
class AuthApicontroller extends Controller
{
    public function showLoginForm()
    {
        return response()->json(['status' => true ]);
    }

    public function login(Request $request)
    {
        //dd('saswawa');
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        //dd($credentials);
        // Retrieve the user based on the email provided
       if(Auth::attempt($credentials))
       {
        $response = [
            'success' => true,
             'data' =>  $credentials,
             'message' => 'user login successfully'

         ];
        return response()->json([$response]);
       }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    
    public function register(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required'
        ]);
           if($validator->fails()){
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response , 400);

           }
             $input = $request->all();
             $input['password'] = bcrypt($input['password']);
             $user = User::create($input);
             $success['token'] = $user->createToken('MyApp')->plainTextToken;
             $success['name'] = $user->name;
             $response = [
                'success' => true,
                 'data' =>  $success,
                 'message' => 'user register successfully'

             ];
             return response()->json($response , 400);



      }


    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();
        // After the user logs out


        // Clear the session data
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect the user to the desired location after logout
        return response()->json(['status' => true]);
    }




}
