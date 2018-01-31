<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PacientesController extends Controller
{
    public function index(Request $req)
    {
      $http = new Client;

      try {
      $pacientes = $http->get(env('API_URL') . '/api/pacientes', [
				'headers' => [
					'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
				],
			]);
        }  catch (RequestException $e){
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
            if(isset($pacientes)){
                $pacientes = json_decode((string) $pacientes->getBody());
                return view('pacientes.index', compact('pacientes'));
            } else {
                 \Session::flash('message', 'Erro ao Exibir Index');
            }

    }

    public function show(Request $req)
    {
      $http = new Client;

      $id = $req->id;
            try{
            $pacientes = $http->get(env('API_URL') . '/api/pacientes/'.$id, [
                'headers' => [
                    'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
                ],
                'json' => [
                    'id' => $id,
                ],
            ]);
            }  catch (RequestException $e){
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
            }
            return redirect('/pacientes');
        }
            if(isset($pacientes)){
                    $pacientes = json_decode((string) $pacientes->getBody());
                    return view('pacientes.show', compact('pacientes'));
            } else {
                return \Session::flash('message', 'Erro ao exibir');
            }
    }

    public function edit(Request $req)
    {
      $http = new Client;

      $id = $req->id;
      try{
      $pacientes = $http->get(env('API_URL') . '/api/pacientes/'.$id, [
          'headers' => [
              'Authorization' => 'bearer' . ' ' . $req->session()->get('token'),
          ],
          'json' => [
              'id' => $id,
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
      }
      return redirect('/pacientes');
  }
      if(isset($pacientes)){
      $pacientes = json_decode((string) $pacientes->getBody());
      return view('pacientes.edit', compact('pacientes'));
       } else {
           return \Session::flash('message', 'Erro');
       }
    }

    public function update(Request $req, $id)
    {
      $http = new Client;

      $dados = $req->all();
      try {
      $pacientes = $http->put(env('API_URL') . '/api/pacientes/'.$id, [
          'headers' => [
              'Authorization' => 'bearer' . ' ' . $req->session()->get('token'),
          ],
          'form_params' => [
                    'nome' => $dados['nome'],
                    'telefone' => $dados['telefone'],
                    'cpf' => $dados['cpf'],
                    'email' => $dados['email']
                ]
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
      }
        return redirect('/pacientes');
      }
      if(isset($pacientes)){
          $pacientes = json_decode((string) $pacientes->getBody(), true);
          return redirect('/pacientes');
        }  else {
            return \Session::flash('message', 'Erro de Update');
        }
    }

    public function destroy(Request $req, $id)
    {
      $http = new Client;
            try {
                $pacientes = $http->delete(env('API_URL') . '/api/pacientes/'.$id, [
                    'headers' => [
                        'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
                    ],
                ]);

                $pacientes = $http->get(env('API_URL') . '/api/pacientes', [
          				'headers' => [
          					'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
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
            }
              return redirect('/pacientes');
            }
            if(isset($pacientes)){
                $pacientes = json_decode((string) $pacientes->getBody());
                return view('pacientes.index', compact('pacientes'));
            } else {
                return \Session::flash('message', 'Erro de Delete');
            }
    }

    public function new()
    {
      return view('pacientes.store');
    }

    public function store(Request $req)
    {
        $http = new Client;

        $dados = $req->all();
        try {
            $pacientes = $http->post(env('API_URL') . '/api/pacientes', [
                'headers' => [
                    'Authorization' => 'bearer' . ' ' . $req->session()->get('token'),
                ],
                'form_params' => [
                          'nome' => $dados['nome'],
                          'telefone' => $dados['telefone'],
                          'cpf' => $dados['cpf'],
                          'email' => $dados['email']
                      ]
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
        }
          return redirect('/pacientes');
        }
        if(isset($pacientes)){
            $pacientes = json_decode((string) $pacientes->getBody(), true);
            return redirect('/pacientes');
        }  else {
            return \Session::flash('message', 'Erro ao Salvar');
        }
    }
}
