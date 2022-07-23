@extends('to-do.master.master')

@section('title', 'Editar Tarefa')

@section('btn')
    <a href="{{ route('todo.home') }}" class="btn btn-primary" title="Home">Home</a>
@endsection

@section('content')
    <section id='task_section'>
        <h2>Editar Tarefa</h2>
        <form action="{{ route('todo.task.update', ['task' => $task->id]) }}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{ $task->id }}">
            <div class="input_area">
                <label for="title">Título da Tarefa</label>
                <input type="text" name="title" id="title" placeholder="Digite o título da tarefa" required
                    value="{{ old('title') ?? $task->title }}">
            </div>

            <div class="input_area">
                <label for="due_date">Data de Realização da Tarefa</label>
                <input type="datetime-local" id="due_date" name="due_date" required
                    value="{{ old('due_date') ?? $task->due_date }}">
            </div>

            <div class="input_area">
                <label for="due_date">Tarefa Realizada?</label>
                <input type="checkbox" id="done" name="done" value="1"
                    {{ old('done') == 1 ? 'checked' : ($task->done == 1 ? 'checked' : '') }}>
            </div>

            <div class="input_area">
                <label for="category_id">Categoria da Tarefa</label>
                <select name="category_id" id="category_id" required>
                    <option disabled value="">Selecione uma Categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : ($task->category_id == $category->id ? 'selected' : '') }}>
                            {{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input_area">
                <label for="description">Descrição da Tarefa</label>
                <textarea name="description" id="description" placeholder="Digite a descrição para a sua tarefa">{{ old('description') ?? $task->description }}</textarea>
            </div>

            <div class="input_area">
                <button type="reset" class="btn">Resetar</button>
                <button type="submit" class="btn btn-primary">Salvar Edição</button>
            </div>
        </form>
    </section>
@endsection
