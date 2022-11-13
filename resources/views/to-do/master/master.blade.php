<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('to-do/css/style.css') }}">
    <title>@yield('title', env('APP_NAME'))</title>
</head>

<body>
    <div class="container">
        <div class="sidebar"><img src="{{ asset('to-do/img/logo.png') }}" alt="Logo"></div>
        <div class="content">
            <nav>
                @yield('btn', null)
            </nav>
            <main>
                @yield('content')
            </main>
        </div>
    </div>

    @yield('todo_js')
</body>

</html>
