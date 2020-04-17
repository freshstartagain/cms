<?php

namespace App\Http\Controllers\Auth;

use Validator;
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
        
        return $this->createDataResponse($status="success", $data=$user);
    }

    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), array(
            "firstname" => "required|min:2",
            "middlename" => "required|min:2",
            "lastname" => "required|min:2",
            "email" => "required|email|unique:user",
            "username" => "required|alpha_num|unique:user",
            "password" => "required|confirmed|alpha_num",
            "mobile" => "required|digits:10",
        ));

        if($validate->fails())
        {
            return $this->createMessageResponse($status="error", $message=$validate->errors());
        }

        $user_data = array(
            "firstname" => $request->firstname,
            "middlename" => $request->middlename,
            "lastname" => $request->lastname,
            "email" => $request->email,
            "username" => $request->username,
            "mobile" => $request->mobile,
            "password"=> bcrypt($request->password),
            "address_id" => 4,
            "position_id" => 3
        );

        $user = User::create($user_data);
        $user->save();

        return $this->createDataResponse($status="success", $data=$user, $response_code=201);

    }

    public function login(Request $request)
    {
        $credentials = $request->only(["username", "password"]);

        if (!$token = auth()->attempt($credentials)) {
            return $this->createMessageResponse($status="success", $message="Unauthorized");
        }

        $data = array(
            "access_token" => $token,
            "token_type" => "Bearer",
        );

        return $this->createDataResponse($status="success", $data=$data);

    }

    public function logout(Request $request)
    {
        auth()->logout();
        return $this->createMessageResponse($status="success", $message="Logged out Successfully.", $response_code=200);
    }

    public function refresh(Request $request)
    {
        $data = array(
            "access_token" => auth()->refresh(),
            "token_type" => "Bearer",
        );

        return $this->createDataResponse($status="success", $data=$data);
    }

    private function createDataResponse($status, $data, $response_code = 200)
    {
        return response()->json(array(
            "status" => $status,
            "data" => $data
        ), $response_code);
    }

    private function createMessageResponse($status="error", $message, $response_code = 401)
    {
        return response()->json(array(
            "status" => $status,
            "message" => $message,
        ), $response_code);
    }
}
