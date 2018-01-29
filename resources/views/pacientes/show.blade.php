@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading"><h3><b>Mostra Paciente</b></h3></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
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
                                            <a href="" type="button" class="btn btn-success">Novo Paciente</a>
                                        </th>
                                    </tr>
                                </thead>

                                 <tbody>
<<?php
    $pacientes = $pacientes->result;
 ?>
                                    <tr>
                                        <td>
                                            {{$pacientes->id}}
                                        </td>
                                        <td>
                                            {{$pacientes->nome}}
                                        </td>
                                        <td>
                                            {{$pacientes->telefone}}
                                        </td>
                                        <td>
                                            {{$pacientes->cpf}}
                                        </td>
                                        <td>
                                            {{$pacientes->email}}
                                        </td>
                                        <td>


                                            <a href="{{ url('/pacientes/edit', $pacientes->id) }}" type="button" class="btn btn-warning">Editar</a>
                                             <a href="{{ url('/pacientes')}}" type="button" class="btn btn-info">Voltar</a>
                                            <a data-href="{{ url('/paciente/delete', $pacientes->id) }}" type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#myModal" text="{{$pacientes->nome}}">Excluir</a>
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
