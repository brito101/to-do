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
        <div class="sidebar">Logo</div>
        <div class="content">
            <nav><a href="#" class="btn btn-primary" title="Criar Tarefa">Criar Tarefa</a></nav>
            <main>
                <section class="graph">
                    <div class="graph-header">
                        <h2>Progresso do dia</h2>
                        Data
                    </div>
                    <div class="graph-subtitle">Tarefas <b>3/6</b></div>
                    <div class="graph-placeholder"></div>
                    <p class="graph-text-left">Restam 3 tarefas a serem realizadas</p>
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
                                <a href="#" title="Editar">Editar</a>
                                <a href="#" title="Excluir">Excluir</a>
                            </div>
                        </div>

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
                                <a href="#" title="Editar">Editar</a>
                                <a href="#" title="Excluir">Excluir</a>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>

</html>
