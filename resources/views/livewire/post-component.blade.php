<div class="page_post">
    <article class="posts_details">
        <div class="container_detailts">
            <span class="author"><i class="fa-sharp fa-light fa-pencil-mechanical"></i>{{$post->user->name}}</span>
            <h1>{{$post->title}}</h1>
            <h2>{{$post->subtitle}}</h2>
            <p>{{$post->content}}</p>
        </div>
        <div class="post_interations">
            <div class="count_likes_comments">
                <span><i class="fa-regular fa-heart"></i>2</span>
                <hr>
                <span><i class="fa-light fa-comment"></i>{{$comments->count()}} comments</span>
            </div>
            <div class="comments">
                <div class="add_comment">
                    <textarea wire:model="body" placeholder="Add a comment..."></textarea>
                    <button wire:click="comment">Submit</button>
                </div>
                <hr>
                <div class="container-comments">
                    {{-- 
                    Añadimos el key, debido a que cada componente tiene un wire:id asociado y en el servidor se
                    guardan cada wire:id que relaciona el componente del DOM con su respectivo controlador, pero qué
                    pasa si añades otro comentario, se envían nuevamente todo el array de comentario, cuando los vaya añadir
                    el servidor que tiene los wire:id identificadores de cada controlador, el dice y este wire:id no sé a qué
                    comentario pertenecía porque él no lee el contenido, entonces los reparte de mala manera y los reutiliza,
                    entonces usamos el key para que aunque añadamos un comentario permanezca el identificador y en el servidor
                    también se guarda el key.
                    {
                    wire:id: abc123
                    key: id que nunca cambia
                    }
                    --}}
                    @foreach ($comments as $comment)
                        @livewire('comment-component', ['comment' => $comment], key($comment->id)) 
                    @endforeach
                </div>
            </div>
        </div>
    </article>
</div>
