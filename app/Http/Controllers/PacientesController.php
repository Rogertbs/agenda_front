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

      $pacientes = $http->get(env('API_URL') . '/api/pacientes', [
				'headers' => [
					'Authorization' => 'bearer' . ' ' . $req->session()->get('token'),
				],
			]);


         $pacientes = json_decode((string) $pacientes->getBody());

        return view('pacientes.index', compact('pacientes'));
    }

    public function show(Request $req)
    {
      $http = new Client;

      $id = $req->id;

            $pacientes = $http->get(env('API_URL') . '/api/pacientes/'.$id, [
                'headers' => [
                    'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
                ],
                'json' => [
                    'id' => $id,
                ],
            ]);

      $pacientes = json_decode((string) $pacientes->getBody());

      return view('pacientes.show', compact('pacientes'));
    }

    public function edit(Request $req)
    {
      $http = new Client;

      $id = $req->id;

      $pacientes = $http->get(env('API_URL') . '/api/pacientes/'.$id, [
          'headers' => [
              'Authorization' => 'bearer' . ' ' . $req->session()->get('token'),
          ],
          'json' => [
              'id' => $id,
          ],
      ]);

      $pacientes = json_decode((string) $pacientes->getBody());

      return view('pacientes.edit', compact('pacientes'));

    }

    public function update(Request $req, $id)
    {
      $http = new Client;

      $dados = $req->all();

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

      $pacientes = json_decode((string) $pacientes->getBody(), true);

      return redirect('/pacientes');
    }

    public function destroy(Request $req, $id)
    {
      $http = new Client;

            $pacientes = $http->delete(env('API_URL') . '/api/pacientes/'.$id, [
                'headers' => [
                    'Authorization' => 'bearer' . ' ' . $req->session()->get('token'),
                ],
                'json' => [
                    'id' => $id,
                ],
            ]);

            $pacientes = json_decode((string) $pacientes->getBody());

            return view('pacientes.show', compact('pacientes'));
    }

    public function new()
    {
      return view('pacientes.store');
    }

    public function store(Request $req)
    {
        $http = new Client;

        $dados = $req->all();

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

        $pacientes = json_decode((string) $pacientes->getBody(), true);

        return redirect('/pacientes');
    }
}
