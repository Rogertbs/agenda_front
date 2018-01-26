<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class UserController extends Controller
{
    //
    public function login()
    {
      return View("auth.login1");
    }

    public function singin(Request $req)
    {
      $user = $req->all();
      $http = new Client;

  			$login = $http->post(env('API_URL') . '/api/auth/login', [
          // 'form_params' => [
          //       'login' => env($user['email']),
          //       'password' => env($user['password']),
          //   ],
          'form_params' => [
                'login' => env("API_USER"),
                'password' => env('API_PASSWORD'),
            ],
  			]);
        dd($login);

      return response()->json($login->getBody());
    }
}
