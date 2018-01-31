@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading"><h3><b>Lista de Médicos</b></h3></div>

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
                                            CRM
                                        </th>
                                        <th>
                                            <a href="{{url('/medicos/novo')}}" type="button" class="btn btn-success">Novo Médico</a>
                                        </th>
                                    </tr>
                                </thead>

                                 <tbody>
                                    @foreach($medicos as $medico)
                                    <tr>
                                        <td>
                                            {{$medico->id}}
                                        </td>
                                        <td>
                                            {{$medico->nome}}
                                        </td>
                                        <td>
                                            {{$medico->telefone}}
                                        </td>
                                        <td>
                                            {{$medico->cpf}}
                                        </td>
                                        <td>
                                            {{$medico->crm}}
                                        </td>
                                        <td>

                                            <a href="{{ url('/medicos/show', $medico->id) }}" type="button" class="btn btn-primary">Visualizar</a>
                                            <a href="{{ url('/medicos/edit', $medico->id) }}" type="button" class="btn btn-warning">Editar</a>
                                            <a data-href="{{ url('/medicos/delete', $medico->id) }}" type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#myModal" text="{{ $medico->nome }}">Excluir</a>
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
