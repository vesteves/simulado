@extends('layout')
    @section('content')
    	<h1 align="center">Consulta Correio</h1>
        <hr/>

        <div class="col-md-4">
        	{!! Form::open() !!}
                <div class="form-group">
                    {!! Form::label('cep', 'Coloque seu CEP:') !!}
                    {!! Form::text('cep', null, ['class' => 'form-control', 'maxlength' => '8']) !!}
                    {!! Form::submit('Consultar', ['class' => 'btn btn-primary form-control']) !!}
                </div>
        	{!! Form::close() !!}
            <div id="message">{{ $message or '' }}</div>
        <div class="col-md-4">
    @stop