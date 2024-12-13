<div class="comment">
    <div class="body_comment">
        <div class="img_profile">
            <img class="image_profile" src="/images/user_profile_comments.png">
        </div>
        <div>
            <div class="user_comment">
                <p>{{ $comment->user->name }}</p>
                <span>•</span>
                <span class="time_relative">{{ $comment->time_relative }}</span>
            </div>
            <p>{{ $comment->body }}</p>
            <!-- Si hay respuestas, mostramos el enlace para ver/ocultar respuestas -->
            @if ($comment->reply->count() > 0)
                <span wire:click="toggleReplies({{ $comment->id }})">
                    @if (isset($visibleReplies[$comment->id]) && $visibleReplies[$comment->id])
                        Hide the replies
                    @else
                        View the {{ $comment->reply->count() }} replies
                    @endif
                </span>
            @endif
        </div>
    </div>
    <!-- Mostrar respuestas si están visibles -->
    @if (isset($visibleReplies[$comment->id]) && $visibleReplies[$comment->id])
        <div class="replies">
            @foreach ($comment->reply as $reply)
                <div class="reply">
                    <!-- Recursividad para respuestas -->
                    @livewire('comment-component', ['comment' => $reply], key($comment->id))
                </div>
            @endforeach
        </div>
    @endif
</div>