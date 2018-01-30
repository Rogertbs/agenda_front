@extends('layouts.app')

@section('content')

<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading"><h3><b>Cadastro de Médicos</b></h3></div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{url('/agenda/medicos')}}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Nome do Médico</label>
                            <input type="text" class="form-control" name="nome" placeholder="Nome do Médico">
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
                            <label for="description">CRM</label>
                            <input type="text" class="form-control" name="crm" placeholder="CRM">
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
