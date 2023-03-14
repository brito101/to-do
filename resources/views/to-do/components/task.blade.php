<div class="task {{ $done == true ? 'done' : 'pending' }}">
    <div class="title">
        <input type="checkbox" {{ $done == true ? 'checked' : '' }} onchange="taskUpdate(this)"
            data-id={{ $id }} />
        <div class="task-title">{{ $title ?? null }}</div>
    </div>
    <div class="priority">
        <div class="sphere"></div>
        <div>{{ $category ?? null }}</div>
    </div>
    <div class="actions">
        <a href="{{ route('todo.task.edit', ['task' => $id]) }}" title="Editar"><img
                src="{{ asset('to-do/img/icon-edit.png') }}" alt="Editar"></a>
        <a href="{{ route('todo.task.delete', ['id' => $id]) }}" title="Excluir"><img
                src="{{ asset('to-do/img/icon-delete.png') }}" alt="Excluir"></a>
    </div>
</div>
