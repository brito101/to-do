<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('to-do/css/style.css') }}">
    <title>To-Do App</title>
</head>

<body>
    <div class="container">
        <div class="sidebar"><img src="{{ asset('to-do/img/logo.png') }}" alt="Logo"></div>
        <div class="content">
            <nav><a href="#" class="btn btn-primary" title="Criar Tarefa">Criar Tarefa</a></nav>
            <main>
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
                        <div class="task">
                            <div class="title">
                                <input type="checkbox" />
                                <div class="task-title">Título da Tarefa</div>
                            </div>
                            <div class="priority">
                                <div class="sphere"></div>
                                <div>Prioridade</div>
                            </div>
                            <div class="actions">
                                <a href="#" title="Editar"><img src="{{ asset('to-do/img/icon-edit.png') }}"
                                        alt="Editar"></a>
                                <a href="#" title="Excluir"><img src="{{ asset('to-do/img/icon-delete.png') }}"
                                        alt="Excluir"></a>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>

</html>
