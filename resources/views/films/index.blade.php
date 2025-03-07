

<h1>List of Films</h1>

<a href = "{{ route('films.create') }}">Create new Film</a>

<ul>
    @foreach($films as $film)
    <li>
        <a href="{{ route('films.show', $film->id) }}">{{ $film->title }}</a>

        <a href = "{{ route('films.edit', $film->id) }}">Edit</a>

        <form action = "{{route('films.destroy', $film->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
    @endforeach
</ul>
<div class="ad-banner">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-xxxxxxxxxxxxxxxx"
        data-ad-slot="yyyyyyyyyy"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>

