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
          'form_params' => [
                'email' => $user['email'],
                'password' => $user['password'],
            ],
  			]);

            $token = json_decode($login->getBody());
            // dd($req->session()->put(['token' => $token['access_token']]));
            // $req->session()->put(['token' => $token['access_token']]);
            // $req->session()->put(['token_type' => $token['token_type']]);
            // $req->session()->put(['token_expires' => $token['expires_in']]);
            // $req->session()->put(['user_id' => $token['user_id']]);

          //  dd($req->session()->get('token'));

        return view('home', compact('login'));
    }
}
