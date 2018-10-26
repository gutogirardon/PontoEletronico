@extends('adminlte::page')

@section('title', ' - Ponto Eletrônico')

@section('content_header')
    {!! Html::script('js/timer.js') !!}
    <div class="container-fluid">
        <h1>Registro de Ponto Eletrônico</h1>
        <small>Último login
            em {{Carbon\Carbon::parse(Auth::user()->last_login)->format('d/m/Y H:i:s')}}</small>
        @stop

        @section('content')

            <div class="row">
                <div class="col-md-12">
                    <div align="center" class="jumbotron">
                        <div class="panel-body">
                            <h1 id="timer" class="clock()"></h1>
                            <h4>{{ Carbon\Carbon::today()->format('d/m/Y') }}</h4>
                            {!!  Form::open(['url'=>'record']) !!}
                            {!! Form::hidden('type',$type) !!}
                            <div class="form-group">
                                {!! Form::submit($buttonText, ['class'=>$buttonClass]) !!}
                            </div>
                            <h3>
                                <div id="info" class="has-spinner"></div>
                            </h3>
                            {!!  Form::close() !!}
                            <table class="table table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Data do Registro</th>
                                    <th>Hora do Registro</th>
                                    <th>Endereço IP</th>
                                </tr>
                                </thead>
                                <h4 align="left">Último registro</h4>
                                <tbody>
                                @foreach ($points as $point)
                                    <tr>
                                        @if($point->type == "I")
                                            <td>Entrada</td>
                                        @elseif ($point->type == "II")
                                            <td>Intervalo</td>
                                        @elseif($point->type == "OI")
                                            <td>Retorno Intervalo</td>
                                        @elseif($point->type == "O")
                                            <td>Saída</td>
                                        @endif
                                        <td>{{ Carbon\Carbon::parse($point->date)->format('d/m/Y') }}</td>
                                        <td>{{ Carbon\Carbon::parse($point->date)->format('H:i:s') }}</td>
                                        <td>{{$point->ip}}</td>
                                    </tr>
                                    @break
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>

@stop

