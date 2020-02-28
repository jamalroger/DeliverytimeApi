<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    //

    public function validator($data)
    {




        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function login(Request $request)
    {
        $auth  = auth()->attempt(['email' => request('email'), 'password' => request('password')]);
        if(!$auth)
            return response()->json(['errors'=>'email or password is incorrect'],401);
        $user = auth()->user();
        return response()->json(['token' =>$user->createToken('app')->accessToken], 200);

    }
    
    public function register(Request $request)
    {
        $data = $request->only(['name', 'email', 'password', 'password_confirmation']);

        $this->validator($data)->validate();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $user->createToken('app')->accessToken;
    }
}
