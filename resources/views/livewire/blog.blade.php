<div class="container_view_blog">
    <p>¡Bienvenido a mí primer blog de laravel {{$user->name}}!</p>
    <h1>View posts</h1>
    {{-- barra de búsquerda --}}
    <div class="container_search">
        <label>
            <i class="bi bi-search"></i>
            <input type="search" wire:model.live="search" placeholder="Filter posts">
        </label>
    </div>
    {{--  --}}
    <div class="container_user_posts">
        @if ($posts->isEmpty())
            <p class="post_not_found">No post found.</p>
        @else
            @foreach ($posts as $p)
            <section>
                <p>{{$p->user->name}}</p>
                <h1>{{$p->title}}</h1>
                <h2>{{$p->subtitle}}</h2>
                <div class="likes_and_delete">
                    <span class="likes">
                        <i class="fa-regular fa-heart"></i>2
                    </span>
                </div>
                <a href={{ route('blog.post', $p->id) }}>view more<i class="bi bi-arrow-right"></i></a>
            </section>
            @endforeach
        @endif
    </div>
</div>
