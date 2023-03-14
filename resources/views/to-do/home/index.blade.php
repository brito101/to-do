@extends('to-do.master.master')

@section('title', 'Home')

@section('btn')
    <a href="{{ route('todo.task.create') }}" class="btn btn-primary" title="Criar Tarefa">Criar Tarefa</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Sair</button>
    </form>
@endsection

@section('content')
    <section class="graph">
        <div class="graph-header">
            <h2>Progresso do dia</h2>
            <div class="graph-header-line"></div>
            <div class="graph-header-date">
                <a href="{{ route('todo.home', ['date' => $dayPrev]) }}">
                    <img src="{{ asset('to-do/img/icon-prev.png') }}" alt="">
                </a>
                {{ $day }}
                <a href="{{ route('todo.home', ['date' => $dayAfter]) }}">
                    <img src="{{ asset('to-do/img/icon-next.png') }}" alt="">
                </a>
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
            <select name="" id="" class="list-header-select" onchange="filterStatus(this)">
                <option value="all">Todas as tarefas</option>
                <option value="pending">Todas pendentes</option>
                <option value="done">Todas realizadas</option>
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
                <p>Não existem tarefas cadastradas. Vamos criar sua primeira tarefa deste dia?</p>
            @endforelse
        </div>
    </section>
@endsection

@section('todo_js')
    <script>
        async function taskUpdate(el) {
            let status = el.checked;
            let id = el.dataset.id;
            const url = "{{ route('todo.task.updateStatus') }}"
            let result = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'accept': 'application/json',
                },
                body: JSON.stringify({
                    status,
                    id,
                    _token: '{{ csrf_token() }}'
                })
            });
            let json = await result.json();
            if (json.success) {
                let classDone = status ? 'done' : 'pending'
                el.parentElement.parentElement.classList.remove('done', 'pending');
                el.parentElement.parentElement.classList.add(classDone);
                alert('Task atualizada com sucesso');
            } else {
                el.checked = !status;
            }
        }

        function filterStatus(el) {
            if (el.value == 'done') {
                document.querySelectorAll(".pending").forEach(function(el) {
                    el.style.display = 'none';
                })
                document.querySelectorAll(".done").forEach(function(el) {
                    el.style.display = '';
                })
            } else if (el.value == 'pending') {
                document.querySelectorAll(".done").forEach(function(el) {
                    el.style.display = 'none';
                })
                document.querySelectorAll(".pending").forEach(function(el) {
                    el.style.display = '';
                })
            } else {
                document.querySelectorAll(".done").forEach(function(el) {
                    el.style.display = '';
                })
                document.querySelectorAll(".pending").forEach(function(el) {
                    el.style.display = '';
                })
            }
        }
    </script>
@endsection
