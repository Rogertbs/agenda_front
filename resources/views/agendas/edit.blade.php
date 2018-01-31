@extends('layouts.app')

@section('content')

<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading"><h3><b>Editar Agendar</b></h3></div>
        @if(\Session::has('message'))
            <div class="alert alert-danger">
                <strong>{{\Session::get('message')}} </strong> Método não foi implementado!
            </div>
        @endif
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="meeting">Data do Agendamento : </label>
                            <div class='input-group date'>
                                <input type='date' class="form-control" name="data" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meeting">Hora do Agendamento : </label>
                            <div class='input-group time'>
                                <input type='time' class="form-control" name="hora" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Selecione o Médico</label>
                                <div class="box-select">
                                    <select name="id_medico" class="form-control">
                                        <option value="" disabled selected>Selecione o Médico</option>

                                        <<option value="">{{ $agendas['agenda']['medicos']['nome']}}</option>

                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Selecione o Paciente</label>
                                <div class="box-select">
                                    <select name="id_paciente" class="form-control">
                                        <option value="" disabled selected>Selecione o Paciente</option>


                                        <<option value="">{{$agendas['agenda']['pacientes']['nome']}}</option>

                                    </select>

                                </div>
                        </div>

                    <a type="" class="btn btn-success">Salvar</a>
                    <a href="{{ url('/agendas')}}" type="button" class="btn btn-info">Voltar</a>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
