<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire App</title>

    <!-- Cargar los estilos de Livewire -->
    @livewireStyles
</head>
<body>
    <header>
        <h1>Bienvenido a la Página Principal</h1>
    </header>
    
    <section>
        <h2>Acceder a tu cuenta</h2>
        <a href="{{ route('login') }}">
            <button>Login</button>
        </a>
    </section>

    <!-- Cargar los scripts de Livewire -->
    @livewireScripts
</body>
</html>