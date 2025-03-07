<h1> Edit Film: {{$film->title}}</h1>

<form action="{{ route('films.update', $film->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title', $film->title) }}" required>
    </div>

    <div>
        <label>Discription</label>
        <textarea name="description" required>{{ old('description', $film->description) }}</textarea>
    </div>

    <div>
        <label>Year</label>
        <input type="text" name="year" value="{{ old('year', $film->year) }}">
    </div>

    <div>
        <label> Embed URL </label>
        <input type="text" name="embed_url" value="{{ old('embed_url', $film->embed_url) }}">
    </div>

    <button type="submit">Update</button>
    </form>

    <a href="{{ route('films.index') }}">Back to List</a>
