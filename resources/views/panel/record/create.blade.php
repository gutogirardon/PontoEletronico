@extends('adminlte::page')
@section('title', ' - Ponto Eletrônico')
@section('content_header')
@stop
@section('content')
    <div class="well">
        <h4 class="text-center">Adicionar Registro a Colaborador</h4>
        <hr/>
        {!! Form::open(['url' => '/create', 'class' => 'form-horizontal']) !!}
        {!!  Form::hidden('user_id', $users->id)  !!}


        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                {!! Form::label('date', 'Data do Registro', array('class' => 'control-label')); !!}
                <div class="input-group">
                    {!! Form::date('date', $data = Carbon\Carbon::now()->format('Y-m-d'),
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
                    {!! Form::time('time', $data = Carbon\Carbon::now()->format('H:i'),
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
                    'O' => 'Saída'], ['class' => 'form-control', 'style' => 'width:158px;']); !!}
                </div>
                <!-- /input-group -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                {!! Form::label('desc', 'Descrição:', array('class' => 'control-label')); !!}
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
        <hr/>
        {!! Form::close(); !!}  @foreach ($errors->all() as $error)
            <div class="myAlert-bottom alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{$error}}
            </div>
        @endforeach
    </div>
@stop