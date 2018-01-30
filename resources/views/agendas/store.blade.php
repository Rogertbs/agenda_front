@extends('layouts.app')

@section('content')

<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading"><h3><b>Agendar</b></h3></div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{url('/agenda/agendas')}}" method="post">
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
                                        @foreach($medicos as $medico)
                                        <<option value="{{$medico['id']}}">{{$medico['nome']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Selecione o Paciente</label>
                                <div class="box-select">
                                    <select name="id_paciente" class="form-control">
                                        <option value="" disabled selected>Selecione o Paciente</option>

                                        @foreach($pacientes['result'] as $paciente)
                                        <<option value="{{$paciente['id']}}">{{$paciente['nome']}}</option>
                                        @endforeach
                                    </select>

                                </div>
                        </div>

                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="{{ url('/agenda/agendas')}}" type="button" class="btn btn-info">Voltar</a>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
