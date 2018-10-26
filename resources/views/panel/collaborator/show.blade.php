@extends('adminlte::page')

@section('title', ' - Ponto Eletrônico')

@section('content_header')
    <div class="container-fluid">
        <h1>Usuários Registrados no Sistema</h1>
        <small>Último login
            em {{Carbon\Carbon::parse(Auth::user()->last_login)->format('d/m/Y H:i:s')}}</small>
@stop

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <div class="panel-body">
                        <table id="historico" class="table table-striped table-bordered" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Ações</th>
                                <th>Nome</th>
                                <th>Nível</th>
                                <th>E-Mail</th>
                                <th>Cadastrado Desde</th>
                                <th>Último Acesso em</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td> {!! Form::open(['route' => ['show.user.records', $user->id]]) !!}
                                        {{ Form::button('<i title="Editar Histórico" class="fa fa-edit"> Editar</i>', ['type' => 'submit', 'class' => 'btn btn-info'] )  }}
                                        {!! Form::close() !!}</td>
                                    <td>{{$user->name}}</td>
                                    <td>Nível</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}</td>
                                    <td>{{ Carbon\Carbon::parse($user->last_login)->format('d/m/Y H:i:s') }}</td>
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