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

}
