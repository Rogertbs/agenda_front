<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\User;

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
        try {
      		$login = $http->post(env('API_URL') . '/auth/login', [
              'form_params' => [
                    'email' => $user['email'],
                    'password' => $user['password'],
                ],
      		]);
        } catch (RequestException $e){
            switch ($e->getResponse()->getStatusCode()) {
                case 404:
                    \Session::flash("message", 'Dados não encontrados');
                    break;
                case 500;
                   \Session::flash("message", 'Erro interno do servidor');
                   break;
                case 511;
                    \Session::flash("message", 'Autenticação de rede necessária');
                default:
                    \Session::flash("message", 'Não foi possível exibir');
                    break;
            }
            return redirect('/login');
        }
            if(isset($login)){

                $token = json_decode($login->getBody(), true);
                $req->session()->put('token', $token['access_token']);
                $req->session()->put('token_type', $token['token_type']);
                $req->session()->put('token_expires', $token['expires_in']);
                $req->session()->put('user_id', $token['id']);
                \Session::flash('message', 'Login ok!');


                return view('home', compact('login'));
            } else {
                \Session::flash('message', 'Erro ao fazer logon!');
            }
    }
}
