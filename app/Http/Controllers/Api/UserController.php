<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('register-user')->accessToken;

        return $this->sendResponse($token, 'User registered successfully.');

    }

    public function login(Request $request)
    {
        $validition=Validator::make($request->all(),[
            'email' =>'required|email',
            'password'=>'required'
        ]);

        if($validition->fails()){
            return $this->sendError('Validation Error',$validition->errors());
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user=Auth::user();
            $data['token']= auth()->user()->createToken('Logged-user')->accessToken;
            $data['user_info']=$user;
            return $this->sendResponse($data, 'User login successfully.');
        }else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }
}
