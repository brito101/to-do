@extends('to-do.master.master')

@section('title', 'Criar Tarefa')

@section('btn')
    <a href="{{ route('todo.home') }}" class="btn btn-primary" title="Home">Home</a>
@endsection

@section('content')
    <section id='task_section'>
        <h2>Criar Tarefa</h2>
        <form action="{{ route('todo.task.store') }}" method="POST">
            @csrf
            <div class="input_area">
                <label for="title">Título da Tarefa</label>
                <input type="text" name="title" id="title" placeholder="Digite o título da tarefa" required
                    value="{{ old('title') }}">
                @if ($errors->has('title'))
                    <span class="error">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="input_area">
                <label for="due_date">Data de Realização da Tarefa</label>
                <input type="datetime-local" id="due_date" name="due_date" required value="{{ old('due_date') }}">
                @if ($errors->has('due_date'))
                    <span class="error">{{ $errors->first('due_date') }}</span>
                @endif
            </div>

            <div class="input_area">
                <label for="category_id">Categoria da Tarefa</label>
                <select name="category_id" id="category_id" required>
                    <option selected disabled value="">Selecione uma Categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}</option>
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                    <span class="error">{{ $errors->first('category_id') }}</span>
                @endif
            </div>

            <div class="input_area">
                <label for="description">Descrição da Tarefa</label>
                <textarea name="description" id="description" placeholder="Digite a descrição para a sua tarefa">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <span class="error">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <div class="input_area">
                <button type="reset" class="btn">Resetar</button>
                <button type="submit" class="btn btn-primary">Criar Tarefa</button>
            </div>
        </form>
    </section>
@endsection
