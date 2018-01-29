<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MedicosController extends Controller
{
    //
    public function index(Request $req)
    {
      $http = new Client;

      $medicos = $http->get(env('API_URL') . '/medicos', [
				'headers' => [
					'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
				],
			]);


         $medicos = json_decode((string) $medicos->getBody());

        return view('medicos.index', compact('medicos'));
    }

    public function show(Request $req)
    {
      $http = new Client;

      $id = $req->id;

            $medicos = $http->get(env('API_URL') . '/medicos/'.$id, [
                'headers' => [
                    'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
                ],
                'json' => [
                    'id' => $id,
                ],
            ]);

      $medicos = json_decode((string) $medicos->getBody());

      return view('medicos.show', compact('medicos'));
    }

    public function edit(Request $req)
    {
      $http = new Client;

      $id = $req->id;

      $medicos = $http->get(env('API_URL') . '/medicos/'.$id, [
          'headers' => [
              'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
          ],
      ]);

      $medicos = json_decode((string) $medicos->getBody());

      return view('medicos.edit', compact('medicos'));

    }

    public function update(Request $req, $id)
    {
      $http = new Client;

      $dados = $req->all();

      $medicos = $http->put(env('API_URL') . '/medicos/'.$id, [
          'headers' => [
              'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
          ],
          'form_params' => [
                    'nome' => $dados['nome'],
                    'telefone' => $dados['telefone'],
                    'cpf' => $dados['cpf'],
                    'crm' => $dados['crm']
                ]
      ]);

      $medicos = json_decode((string) $medicos->getBody(), true);

      return redirect('/medicos');

    }

    public function new()
    {
      return view('medicos.store');
    }

    public function store(Request $req)
    {
        $http = new Client;

        $dados = $req->all();

        $medicos = $http->post(env('API_URL') . '/medicos', [
            'headers' => [
                'Authorization' => 'bearer' . ' ' . $req->session()->get('token'),
            ],
            'form_params' => [
                      'nome' => $dados['nome'],
                      'telefone' => $dados['telefone'],
                      'cpf' => $dados['cpf'],
                      'crm' => $dados['crm']
                  ]
        ]);

        $medicos = json_decode((string) $medicos->getBody(), true);

        return redirect('/medicos');
    }

    public function destroy(Request $req, $id)
    {
      $http = new Client;

            $medicos = $http->delete(env('API_URL') . '/medicos/'.$id, [
                'headers' => [
                    'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
                ],
            ]);

            $medicos = $http->get(env('API_URL') . '/medicos', [
      				'headers' => [
      					'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
      				],
      			]);

            $medicos = json_decode((string) $medicos->getBody());

            return view('medicos.index', compact('medicos'));
    }
}
