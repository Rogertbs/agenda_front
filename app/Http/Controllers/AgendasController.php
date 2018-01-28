<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class AgendasController extends Controller
{
    //
    public function index(Request $req)
    {
      $http = new Client;

      // $agendas = $http->get(env('API_URL') . '/api/agendas', [
      //   'headers' => [
      //     'Authorization' => session()->get('token_type') . ' ' . $req->session()->get('token'),
      //   ],
      // ]);


         // $agendas = json_decode((string) $agendas->getBody());
         // dd($agendas);

         $events = array ();

         $events[] = \Calendar::event(
            "Consulta",
            true,
            '2018-02-02',
            '2018-02-02',
            0
         );

         $calendar = \Calendar::addEvents($events)
                    ->setOptions([
                      'firstDay' => 1
                    ])->setCallbacks([

                    ]);

          return view('agendas.index', array('calendar' => $calendar));

        //return view('agendas.index', compact('agendas'));
    }
}
