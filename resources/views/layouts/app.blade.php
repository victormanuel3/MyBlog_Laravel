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
    <main>
        {{ $slot }}
    </main>   
    @livewire('wire-elements-modal')
    @livewireScripts
</body>
</html>