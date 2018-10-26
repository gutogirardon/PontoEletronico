@extends('adminlte::page')

@section('title', ' - Ponto Eletrônico')

@section('content_header')

@stop

@section('content')
    <div class="well">
        <h4 class="text-center">Logs de Atividade do Sistema - Registro de Alterações</h4>
        <hr/>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Tipo do Registro</th>
                <th>Alterado para</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Descrição</th>
                <th>Criado por</th>
                <th>Editado por</th>
                <th>Data edição</th>
            </tr>
            </thead>
            <tbody>
            @foreach($logs as $log)
                <tr>
                    @if($log->oldTypeLog == "I")
                        <td>Entrada</td>
                    @elseif ($log->oldTypeLog == "II")
                        <td>Intervalo</td>
                    @elseif($log->oldTypeLog == "OI")
                        <td>Retorno Intervalo</td>
                    @elseif($log->oldTypeLog == "O")
                        <td>Saída</td>
                    @endif
                    @if($log->newTypeLog == "I")
                        <td>Entrada</td>
                    @elseif ($log->newTypeLog == "II")
                        <td>Intervalo</td>
                    @elseif($log->newTypeLog == "OI")
                        <td>Retorno Intervalo</td>
                    @elseif($log->newTypeLog == "O")
                        <td>Saída</td>
                    @endif
                    <td>{{ Carbon\Carbon::parse($log->dateLog)->format('d/m/Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($log->dateLog)->format('H:i:s') }}</td>
                    <td>{{$log->description}}</td>
                    @foreach($users as $user)
                        @if($user->id == $log->owner)
                            <td>{{$user->name}}</td>
                        @endif
                    @endforeach
                        @foreach($users as $user)
                            @if($user->id == $log->edited_by)
                                <td>{{$user->name}}</td>
                            @endif
                        @endforeach
                    <td>{{Carbon\Carbon::parse($log->created_at)->format('d/m/Y H:i:s')}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
@stop