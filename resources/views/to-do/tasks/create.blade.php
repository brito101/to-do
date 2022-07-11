@extends('to-do.master.master')

@section('title', 'Criar Tarefa')

@section('btn')
    <a href="{{ route('todo.home') }}" class="btn btn-primary" title="Criar Tarefa">Home</a>
@endsection

@section('content')
    <h2>Criar Tarefa</h2>
@endsection
