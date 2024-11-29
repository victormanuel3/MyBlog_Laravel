{{-- class="container d-flex justify-content-center" --}}
<div>
    <p>{{$user->name}}</p>
    <p>Posts: {{$postAmount}}</p>
    <section>
        @foreach ($posts as $p)
            <div>
                <h1>{{$p->title}}</h1>
                <p>{{$p->subtitle}}</p>
                <i wire:click="deletePost({{$p->id}})" class="bi bi-trash3"></i>
            </div>
        @endforeach
    </section>
    <!-- Botón que abre el modal -->
    <button wire:click="$dispatch('openModal', { component: 'create-post' })">Create post</button>
</div>
