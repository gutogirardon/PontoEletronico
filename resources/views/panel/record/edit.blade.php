@extends('adminlte::page')
@section('title', ' - Ponto Eletrônico')
@section('content_header')
@stop
@section('content')
    <div class="well">
        <h4 class="text-center">Informações do Registro</h4>
        <hr/>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Tipo de Registro</th>
                <th>Data do Registro</th>
                <th>Hora do Registro</th>
                <th>Usuário</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @if($records->type == "I")
                    <td>Entrada</td>
                @elseif ($records->type == "II")
                    <td>Intervalo</td>
                @elseif($records->type == "OI")
                    <td>Retorno Intervalo</td>
                @elseif($records->type == "O")
                    <td>Saída</td>
                @endif
                <td>{{ Carbon\Carbon::parse($records->date)->format('d/m/Y') }}</td>
                <td>{{ Carbon\Carbon::parse($records->date)->format('H:i:s') }}</td>
                <td>{{$users->name}}</td>
            </tr>
            </tbody>
        </table>
        <!-- Edição do Registro -->
        <hr/>
        <h4 class="text-center">Alterar Registro</h4>
        <hr/>
        {!! Form::open(['url' => '/update', 'class' => 'form-horizontal']) !!}
        {!!  Form::hidden('record_id', $records->record_id)  !!}
        {!!  Form::hidden('user_id', $records->user_id)  !!}
        {!!  Form::hidden('newTypeLog', $records->type)  !!}
        {!!  Form::hidden('dateLog', $records->date)  !!}
        {!!  Form::hidden('edited_by', Auth::id())  !!}
        {!!  Form::hidden('created_at_log', $records->created_at)  !!}
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                @foreach ($errors->all() as $error)
                    <div class="myAlert-bottom alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{$error}}
                    </div>
                @endforeach
                {!! Form::label('date', 'Data do Registro', array('class' => 'control-label')); !!}
                <div class="input-group">
                    {!! Form::date('date', $data = Carbon\Carbon::parse($records->date)->format('Y-m-d'),
                    ['class' => 'form-control','style' => 'width:160px;']); !!}
                </div>
                <!-- /input-group -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                {!! Form::label('time', 'Hora do Registro', array('class' => 'control-label')); !!}
                <div class="input-group">
                    {!! Form::time('time', $data = Carbon\Carbon::parse($records->date)->format('H:i'),
                    ['class' => 'form-control', 'style' => 'width:160px;']); !!}
                </div>
                <!-- /input-group -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                {!! Form::label('type', 'Tipo do Registro', array('class' => 'control-label')); !!}
                <div class="input-group">
                    {!! Form::select('type', [
                    'I' => 'Entrada',
                    'II' => 'Intervalo',
                    'OI' => 'Retorno Intervalo',
                    'O' => 'Saída'], $records->type, ['class' => 'form-control', 'style' => 'width:158px;']); !!}
                </div>
                <!-- /input-group -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                {!! Form::label('desc', 'Motivo Alteração', array('class' => 'control-label')); !!}
                <div class="input-group">
                    {!! Form::textarea('description', null, ['class'=>'form-control','rows' => 1, 'cols' => 40]) !!}
                </div>
                <!-- /input-group -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <hr/>
                <div class="input-group">
                    {!! Form::button('<i class="fa fa-save"></i> Salvar', ['type' => 'submit', 'class' => 'btn btn-success']);  !!}
                </div>
                <!-- /input-group -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
        {!! Form::close(); !!}
    </div>
@stop