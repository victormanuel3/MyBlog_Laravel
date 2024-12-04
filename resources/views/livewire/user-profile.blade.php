{{-- class="container d-flex justify-content-center" --}}
<div>
    <div class="container_card">
        <div class="card_user">
            <img src="/images/user.png" alt="image_user">
            <p>{{$user->name}}</p>
            <p>{{$user->email}}</p>
            <div>
                <p>
                    <span>{{$postAmount}}</span>
                    <span>POSTS</span>
                </p>
                <hr>
                <p>
                    <span>2</span>
                    <span>LIKES</span>
                </p>
            </div>
        </div>
    </div>
    <div class="container_user_posts">
        @if ($posts->isEmpty())
            <p class="post_not_found">you have no post published.</p>
        @else
            @foreach ($posts as $p)
                <section>
                    <i class="fa-regular fa-file-pen"
                       wire:click="$dispatch('openModal', { component: 'create-post', arguments: {post:{{ $p->id }}} })">
                    </i>
                    <p>{{$p->user->name}}</p>
                    <h1>{{$p->title}}</h1>
                    <h2>{{$p->subtitle}}</h2>
                    <div class="likes_and_delete">
                        <span class="likes">
                            <i class="fa-regular fa-heart"></i>2
                        </span>
                        <i wire:click="deletePost({{$p->id}})" class="fa-regular fa-trash delete_post"></i>
                    </div>
                    <a href={{ route('blog.post', $p->id) }}>view more<i class="bi bi-arrow-right"></i></a>
                </section>
            @endforeach
        @endif
    </div>
    <!-- Botón que abre el modal -->
    <button class="btn_publish_post" 
            wire:click="$dispatch('openModal', { component: 'create-post' })">
            <p>Create post</p><i class="bi bi-pencil-square"></i>
    </button>
</div>