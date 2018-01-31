<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class AgendasController extends Controller
{
    //
    public function index(Request $req)
    {

      $http = new Client;

      $agendas = $http->get(env('API_URL') . '/api/agendas', [
        'headers' => [
          'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
        ],
      ]);

         $agendas = json_decode((string) $agendas->getBody());

         return view('agendas.index', compact('agendas'));
    }

    public function new(Request $req)
    {
        $http = new Client;

        $medicos = $http->get(env('API_URL') . '/api/medicos', [
          'headers' => [
            'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
          ],
        ]);

        $pacientes = $http->get(env('API_URL') . '/api/pacientes', [
          'headers' => [
            'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
          ],
        ]);

        $pacientes = json_decode((string) $pacientes->getBody(), true);
        $medicos = json_decode((string) $medicos->getBody(), true);

        return view('agendas.store', compact('pacientes', 'medicos'));
    }

    public function store(Request $req)
    {
        $http = new Client;

        $dados = $req->all();
        // dd($dados);
        $agendas = $http->post(env('API_URL') . '/api/agendas', [
            'headers' => [
                'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
            ],
            'form_params' => [
                      'data' => $dados['data'],
                      'hora' => $dados['hora'],
                      'id_medico' => $dados['id_medico'],
                      'id_paciente' => $dados['id_paciente']
                  ]
              ]);

              $agendas = json_decode((string) $agendas->getBody(), true);

              return redirect('/agendas');
    }

    public function show(Request $req)
    {
      $http = new Client;

      $id = $req->id;
            try{
            $agendas = $http->get(env('API_URL') . '/api/agendas/'.$id, [
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
            }
            return redirect('/agendas');
            \Session::flash("message", 'Não foi possível exibir');
        }
            if(isset($agendas)){
                    $agendas = json_decode((string) $agendas->getBody(), true);
                    return view('agendas.show', compact('agendas'));
            } else {
                return \Session::flash('message', 'Erro ao exibir');
            }
    }

    public function edit(Request $req)
    {
      $http = new Client;

      $id = $req->id;
            try{
            $agendas = $http->get(env('API_URL') . '/api/agendas/'.$id, [
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
            }
            return redirect('/agendas');
            \Session::flash("message", 'Não foi possível exibir');
        }
            if(isset($agendas)){
                    \Session::flash("message", 'O Método não foi implementado');
                    $agendas = json_decode((string) $agendas->getBody(), true);
                    return view('agendas.edit', compact('agendas'));
            } else {
                return \Session::flash('message', 'Erro ao exibir');
            }
    }

    public function update(Request $req, $id)
    {
            \Session::flash('message', 'O Método update não foi implementado');

          return redirect('/agendas');

        }


        public function destroy(Request $req, $id)
        {
          $http = new Client;
                try {
                    $agendas = $http->delete(env('API_URL') . '/api/agendas/'.$id, [
                        'headers' => [
                            'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
                        ],
                    ]);

                    $agendas = $http->get(env('API_URL') . '/api/agendas', [
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

                  return redirect('/agendas');
                }
                if(isset($agendas)){
                    \Session::flash("message", 'Deletado com sucesso!');
                    $agendas = json_decode((string) $agendas->getBody());
                    return view('agendas.index', compact('agendas'));
                } else {
                    return \Session::flash('message', 'Erro de Delete');
                }
        }
}
