@extends('layouts.app')

@section('content')

<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading"><h3><b>Cadastro de Pacientes</b></h3></div>
        @if(\Session::has('message'))
            <div class="alert alert-danger">
                <strong>{{\Session::get('message')}} </strong>  Algum problema ocorreu!
            </div>
        @endif
        <div class="panel-body">
            <div class="row">

                <div class="col-md-12">
                    <form action="{{url('/pacientes')}}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Nome do Paciente</label>
                            <input type="text" class="form-control" name="nome" placeholder="Nome do Paciente">
                        </div>
                        <div class="form-group">
                            <label for="description">Telefone</label>
                            <input type="text" class="form-control" name="telefone" placeholder="Telefone">
                        </div>
                        <div class="form-group">
                            <label for="description">CPF</label>
                            <input type="text" class="form-control" name="cpf" placeholder="CPF">
                        </div>
                        <div class="form-group">
                            <label for="description">E-MAIL</label>
                            <input type="text" class="form-control" name="email" placeholder="E-mail">
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
