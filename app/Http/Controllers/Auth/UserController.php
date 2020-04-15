<?php

namespace App\Http\Controllers\Auth;

// use Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Auth\User;



class UserController extends Controller
{
    public function __construct()
    {
    }

    public function show()
    {
        $user = User::find(Auth::user()->id);
        
        return $this->createResponse($status="success", $data=$user);
    }

    public function register(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));

        $user = new User();

        $user->name = $name;
        $user->email = $email;
        $user->password = $password;

        $user->save();

        return response()->json([
            'success'
        ], 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return $this->createResponse($status="error", $data="", $message="Unauthorized", $response_code=401);
        }

        $data = array(
            "access_token" => $token,
            "token_type" => "Bearer",
        );

        return $this->createResponse($status="success", $data=$data);

    }

    public function logout(Request $request)
    {
        auth()->logout();
        return $this->createResponse($status="success", $message="Logged out Successfully.");
    }

    public function refresh(Request $request)
    {
        $data = array(
            "access_token" => auth()->refresh(),
            "token_type" => "Bearer",
        );

        return $this->createResponse($status="success", $data=$data);
    }

    private function createResponse($status, $data="", $message="", $response_code = 200)
    {
        return response()->json([
            "status" => $status,
            "message" => $message,
            "data" => $data
        ], $response_code);
    }
}
