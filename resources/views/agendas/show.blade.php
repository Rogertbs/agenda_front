@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading"><h3><b>Mostra Médico</b></h3></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(\Session::has('message'))
                        <div class="alert alert-danger">
                            <strong>{{\Session::get('message')}} </strong>  Algum problema ocorreu!
                        </div>
                    @endif

        <div class="panel panel-default">

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            DATA
                                        </th>
                                        <th>
                                            HORA
                                        </th>
                                        <th>
                                            MÉDICO
                                        </th>
                                        <th>
                                            PACIENTE
                                        </th>
                                        <th>
                                            <a href="" type="button" class="btn btn-success">Agendar</a>
                                        </th>
                                    </tr>
                                </thead>

                                 <tbody>

                                    <tr>
                                        <td>
                                          <span class="label label-primary">{{ $agendas['agenda']['data'] }}</span>
                                        </td>
                                        <td>
                                           <span class="label label-primary">{{ $agendas['agenda']['hora'] }}</span>
                                        </td>
                                        <td>
                                          <b>{{ $agendas['agenda']['medicos']['nome'] }}</b>
                                        </td>
                                        <td>
                                           <b>{{ $agendas['agenda']['pacientes']['nome'] }}</b>
                                        </td>
                                        <td>


                                            <a href="{{ url('/agendas/edit', $agendas['agenda']['id']) }}" type="button" class="btn btn-warning">Editar</a>
                                             <a href="{{ url('/agendas')}}" type="button" class="btn btn-info">Voltar</a>
                                            <a data-href="{{ url('/agendas/delete', $agendas['agenda']['id']) }}" type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#myModal" text="{{$agendas['agenda']['data']}}">Excluir</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Deseja excluir este Item?</h4>
                          </div>
                          <div class="modal-body">

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                            <a href="#" type="button" class="btn btn-danger" id="btn-delete">Excluir</a>
                          </div>
                        </div>
                      </div>
                    </div>

        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
