@extends('layout')
    @section('content')
        <h1 align="center">Resposta Correio</h1>
        <p>Endereço completo para o CEP  {{ $cep }}:</p>
        <p><strong>Logradouro:</strong> {{ $logradouro }}</p>
        <p><strong>Complemento:</strong> {{ $complemento }}</p>
        <p><strong>Bairro:</strong> {{ $bairro }}</p>
        <p><strong>Localidade:</strong> {{ $localidade }}</p>
        <p><strong>UF:</strong> {{ $uf }}</p>
        <p><strong>Unidade:</strong> {{ $unidade }}</p>
        <p><strong>IBGE:</strong> {{ $ibge }}</p>
        <p><strong>Gia:</strong> {{ $gia }}</p>
        <a href="{{ url('correios') }}">Voltar</a>
    @stop