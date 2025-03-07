<h1>{{ $film->title }}</h1>
<p>{{ $film->description }}</p>
<p>Year: {{ $film->year }}</p>

@if($film->embed_url)
    <iframe width="560" height="315" src="{{ $film->embed_url }}" frameborder="0" allowfullscreen></iframe>
@endif
<br>
@auth
    <form action="{{ route('comments.store', $film->id) }}" method="POST">
        @csrf
        <textarea name="body" rows="3" required></textarea>
        <button type="submit">Добавить комментарий</button>
    </form>
@endauth

<h2>Комментарии</h2>
@foreach ($film->comments as $comment)
    <div>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>

        @if (auth()->check() && auth()->id() === $comment->user_id)
            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Удалить</button>
            </form>
        @endif
    </div>
@endforeach

<br>
<a href="{{ route('films.edit', $film->id)}}">Edit</a>
<a href="{{ route('films.index') }}">Back to List</a>
