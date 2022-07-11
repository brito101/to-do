@extends('to-do.master.master')

@section('title', 'Home')

@section('btn')
    <a href="{{ route('todo.task.create') }}" class="btn btn-primary" title="Criar Tarefa">Criar Tarefa</a>
@endsection

@section('content')
    <section class="graph">
        <div class="graph-header">
            <h2>Progresso do dia</h2>
            <div class="graph-header-line"></div>
            <div class="graph-header-date">
                <img src="{{ asset('to-do/img/icon-prev.png') }}" alt="">
                13 Dez 2022
                <img src="{{ asset('to-do/img/icon-next.png') }}" alt="">
            </div>
        </div>
        <div class="graph-subtitle">Tarefas <b>3/6</b></div>
        <div class="graph-placeholder"></div>
        <div class="graph-text-left">
            <img src="{{ asset('to-do/img/icon-info.png') }}" alt="">
            Restam 3 tarefas a serem realizadas
        </div>
    </section>
    <section class="list">
        <div class="list-header">
            <select name="" id="" class="list-header-select">
                <option value="1">Todas as tarefas</option>
            </select>
        </div>
        <div class="task-list">
            @forelse ($tasks as $task)
                @include('to-do.components.task', [
                    'done' => $task->done,
                    'title' => $task->title,
                    'category' => $task->category->title,
                    'id' => $task->id,
                ])
            @empty
                <p>Não existem tarefas cadastradas. Vamos criar sua primeira tarefa?</p>
            @endforelse
        </div>
    </section>
@endsection
