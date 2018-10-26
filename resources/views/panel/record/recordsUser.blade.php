@extends('adminlte::page')

@section('title', ' - Ponto Eletrônico')

@section('content_header')
    <div class="container-fluid">
        <h1><h1>Registros do Usuário:
                @foreach($users as $user)
                    {{$user->name}}
                </h1></h1>
        <td> {!! Form::open(['route' => ['create.user.records', $user->id]]) !!}@endforeach
            {{ Form::button('<i title="Criar Histórico" class="fa fa-edit"> Registrar novo Ponto</i>', ['type' => 'submit', 'class' => 'btn btn-info'] )  }}
            {!! Form::close() !!}</td>
        @stop

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <div class="panel-body">
                    <table id="historico" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Ação</th>
                            <th>Tipo</th>
                            <th>Data de Registro</th>
                            <th>Endereço IP</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($points as $point)
                            <tr>
                                <td> {!! Form::open(['route' => ['edit.user.records', $point->record_id]]) !!}
                                    {{ Form::button('<i title="Editar Registro" class="fa fa-edit"> Editar</i>', ['type' => 'submit','class' => 'btn btn-info'] )  }}
                                    {!! Form::close() !!}</td>
                                @if($point->type == "I")
                                    <td>Entrada</td>
                                @elseif ($point->type == "II")
                                    <td>Intervalo</td>
                                @elseif($point->type == "OI")
                                    <td>Retorno Intervalo</td>
                                @elseif($point->type == "O")
                                    <td>Encerrar Jornada</td>
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
@stop