@extends('adminlte::page')

@section('title', ' - Ponto Eletrônico')

@section('content_header')
    <div class="container-fluid">
        <h1>Histórico de Registros</h1>
        <small>Último login
            em {{Carbon\Carbon::parse(Auth::user()->last_login)->format('d/m/Y H:i:s')}}</small>
        @stop

        @section('content')
            <div class="row">
                <div class="col-md-12">
                    <div align="center" class="jumbotron">
                        <div class="panel-body">
                            <table id="historico" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Data de Registro</th>
                                    <th>Endereço IP</th>

                                </tr>
                                </thead>
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
                                        <td>{{ Carbon\Carbon::parse($point->date)->format('d/m/Y H:i:s') }}</td>
                                        <td>{{$point->ip}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



