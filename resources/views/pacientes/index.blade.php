@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading"><h3><b>Lista de Pacientes</b></h3></div>

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
                                            ID
                                        </th>
                                        <th>
                                            NOME
                                        </th>
                                        <th>
                                            TELEFONE
                                        </th>
                                        <th>
                                            CPF
                                        </th>
                                        <th>
                                            E-MAIL
                                        </th>
                                        <th>
                                            <a href="{{url('/pacientes/novo')}}" type="button" class="btn btn-success">Novo Paciente</a>
                                        </th>
                                    </tr>
                                </thead>

                                 <tbody>
                                    @foreach($pacientes->result as $paciente)
                                    <tr>
                                        <td>
                                            <b>{{$paciente->id}}</b>
                                        </td>
                                        <td>
                                            <b>{{$paciente->nome}}</b>
                                        </td>
                                        <td>
                                            <b>{{$paciente->telefone}}</b>
                                        </td>
                                        <td>
                                            <b>{{$paciente->cpf}}</b>
                                        </td>
                                        <td>
                                            <b>{{$paciente->email}}</b>
                                        </td>
                                        <td>

                                            <a href="{{ url('/pacientes/show', $paciente->id) }}" type="button" class="btn btn-primary">Visualizar</a>
                                            <a href="{{ url('/pacientes/edit', $paciente->id) }}" type="button" class="btn btn-warning">Editar</a>
                                            <a data-href="{{ url('/pacientes/delete', $paciente->id) }}" type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#myModal" text="{{ $paciente->nome }}">Excluir</a>
                                        </td>
                                    </tr>
                                    @endforeach
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
                            <a href="{{ url('/agenda/pacientes/delete', $paciente->id) }}" type="button" class="btn btn-danger" id="btn-delete">Excluir</a>
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
