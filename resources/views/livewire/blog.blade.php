<div class="container" style="font-family: Montserrat, sans-serif;">
    <p>¡Bienvenido a mí primer blog de laravel {{$user->name}}!</p>
    <h1>View posts</h1>
    {{-- barra de búsquerda --}}
    <label class="w-100 mb-5" for="search">
        <div class="w-70 position-relative">
            <i class="bi bi-search position-absolute"></i>
            <input class="ipt_s w-100 rounded-4" style="height: 48px; padding-left: 45px;" 
            type="search" wire:model.live="search" id="search" placeholder="filtrar posts">
        </div>
    </label>
    {{--  --}}
    <div class="row">
        {{-- diferencia entre el wire:model.live y sin el .live --}}
        @foreach ($posts as $post)
        <div class="col-12 col-md-6 mb-4">
            <section class="border-0 p-4 h-100" style="background-color: white; box-shadow: 4px 4px 10px #8080807d">
                <p>{{$post->user->name}}</p>
                <div>
                    <h1 class="text-black text-center">{{ $post->title }}</h1>
                    <h2 class="text-center text-secondary">{{ $post->subtitle }}</h2>
                </div>
            </section>
        </div>
        @endforeach
    </div>
</div>
