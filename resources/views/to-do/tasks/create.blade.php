@extends('to-do.master.master')

@section('title', 'Criar Tarefa')

@section('btn')
    <a href="{{ route('todo.home') }}" class="btn btn-primary" title="Criar Tarefa">Home</a>
@endsection

@section('content')
    <section id='create_task_section'>
        <h2>Criar Tarefa</h2>
        <form action="{{ route('todo.task.store') }}" method="POST">
            @csrf
            <div class="input_area">
                <label for="title">Título da Tarefa</label>
                <input type="text" name="title" id="title" placeholder="Digite o título da tarefa" required>
            </div>

            <div class="input_area">
                <label for="due_date">Data de Realização da Tarefa</label>
                <input type="date" id="due_date" name="due_date" required>
            </div>

            <div class="input_area">
                <label for="category_id">Categoria da Tarefa</label>
                <select name="category_id" id="category_id" required>
                    <option selected disabled value="">Selecione uma Categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input_area">
                <label for="description">Descrição da Tarefa</label>
                <textarea name="description" id="description" placeholder="Digite a descrição para a sua tarefa"></textarea>
            </div>

            <div class="input_area">
                <button type="reset" class="btn">Resetar</button>
                <button type="submit" class="btn btn-primary">Criar Tarefa</button>
            </div>
        </form>
    </section>
@endsection
