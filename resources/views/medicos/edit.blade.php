@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading"><h3><b>Editar Médico</b></h3></div>

            <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{url('/agenda/medicos/update',$medicos->id)}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put" />
                                <p>
                                    ID : {{$medicos->id}}
                                </p>
                                <p>
                                </p>
                              <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" name="nome" value="{{$medicos->nome}}">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Telefone</label>
                                <input type="text" class="form-control" name="telefone" value="{{$medicos->telefone}}">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">CPF</label>
                                <input type="text" class="form-control" name="cpf" value="{{$medicos->cpf}}">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">CRM</label>
                                <input type="text" class="form-control" name="crm" value="{{$medicos->crm}}">
                              </div>
                              <button type="submit" class="btn btn-success">Salvar</button>
                              <a href="{{ url('/agenda/medicos')}}" type="button" class="btn btn-info">Voltar</a>
                            </form>

                        </div>
                    </div>
            </div>
        </div>

    </div>

@endsection
