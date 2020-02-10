<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $data = $request->all();
        $errors = [];
        $data = [];
        $message = "";
        $status = true;
        $validator = Validator::make($data, [
          'email' => 'required',
          'password' => 'required',
      ]);

        if ($validator->fails()) {
            $status = false;
            $errors = $validator->errors();
            $message = "Login Failed";
        }

        $credentials = $request->only("email", "password");

        $token = auth('api')->attempt($credentials);
        // dd($token);
        if (! $token) {
            $status = false;
            $errors = [
              "login" => "Invalid username or password",
          ];
            $message = "Login Failed";

        } else {
            $message = "Login Successfull";
            $data = [
              'access_token' => $token,
              'token_type' => 'bearer',
              'expires_in' => auth('api')->factory()->getTTL() * 60
          ];
        }

        return $this->sendResult($message, $data, $errors, $status);
    }

    protected function sendResult($message, $data, $errors = [], $status = true)
    {
        $errorCode = $status ? 200 : 422;
        $result = [
          "message" => $message,
          "status" => $status,
          "data" => $data,
          "errors" => $errors
      ];
        return response()->json($result, $errorCode);
    }
}
