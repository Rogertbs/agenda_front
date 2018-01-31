@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(\Session::has('message'))
                        <div class="alert alert-success">
                            <strong>{{\Session::get('message')}} </strong>  Está logado.
                        </div>
                    @endif                    
                    Bem vindo ao sistema de Agendamento Médico!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
