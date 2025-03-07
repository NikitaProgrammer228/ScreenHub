<h1>Create New Film</h1>

<form action="{{ route('films.store')}}" method="POST">
    @csrf
    <div>
        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title')}}" required>
    </div>

    <div>
        <label>Description:</label>
        <textarea name="description">{{ old('description') }}</textarea>
    </div>

    <div>
        <label>Year:</label>
        <input type="text" name="year" value="{{ old('year') }}" required>
    </div>

    <div>
        <label>Embed URL:</label>
        <input type="text" name="embed_url" value="{{ old('embed_url') }}">
    </div>

    <button type="submit">Create Film</button>
</form>