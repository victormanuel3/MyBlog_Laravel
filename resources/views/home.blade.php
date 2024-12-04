<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-thin.css">
    @livewireStyles
    <link rel="stylesheet" href={{asset('/css/app.css')}}>
</head>
<body>
    {{--
    Una directiva en Blade es un atajo o sintaxis especial 
    que simplifica la escritura de código PHP dentro de las vistas. 
    Blade, el motor de plantillas de Laravel, convierte estas directivas 
    en código PHP al procesar la vista.

    -----> @auth
    <php
    if (Auth::check)

    endif
    ?>
    --}}
    
    @auth
        <nav>
            <h1>Víctor Manuel</h1>
            <div>
                <a href={{route('home')}}><i class="bi bi-house"></i>Home</a>
                <a href={{route('blog')}}><i class="fa-regular fa-grid"></i>Blog</a>
                <a href={{route('user.profile')}}><i class="bi bi-person"></i>My profile</a>
            </div>
        </nav>
    @endauth
    <h1 class="main_title">Bienvenido a la Página Principal de mí blog👋</h1>
    @guest
        <button class="btn_login" onclick="Livewire.dispatch('openModal', { component: 'login' })">LOGIN<i class="bi bi-arrow-up-right-circle"></i></button>
    @endguest
    @livewire('wire-elements-modal')
    <!-- Cargar los scripts de Livewire -->
    @livewireScripts
</body>
</html>
