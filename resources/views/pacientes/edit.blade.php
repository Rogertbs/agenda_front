@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading"><h3><b>Editar Paciente</b></h3></div>
            <?php
                $pacientes = $pacientes->result;
             ?>
            <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{url('/pacientes/update',$pacientes->id)}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put" />
                                <p>
                                    ID : {{$pacientes->id}}
                                </p>
                                <p>
                                </p>
                              <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" name="nome" value="{{$pacientes->nome}}">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Telefone</label>
                                <input type="text" class="form-control" name="telefone" value="{{$pacientes->telefone}}">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">CPF</label>
                                <input type="text" class="form-control" name="cpf" value="{{$pacientes->cpf}}">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">E-MAIL</label>
                                <input type="text" class="form-control" name="email" value="{{$pacientes->email}}">
                              </div>
                              <button type="submit" class="btn btn-success">Salvar</button>
                              <a href="{{ url('/pacientes')}}" type="button" class="btn btn-info">Voltar</a>
                            </form>

                        </div>
                    </div>
            </div>
        </div>

    </div>

@endsection
