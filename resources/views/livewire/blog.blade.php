<div style="background-color:; padding: 20px;">
    <section>
        <h1>View posts</h1>
        @foreach ($posts as $post)
            <div>
                <h1>{{ $post->title }}</h1>
                <h2>{{ $post->subtitle }}</h2>
            </div>
        @endforeach
    </section>
</div>
