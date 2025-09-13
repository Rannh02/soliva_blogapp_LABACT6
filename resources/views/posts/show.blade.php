<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>
<body>
    <div class="tweet-container">
        <div class="tweet-header">
            <h1>{{ $post->title }}</h1>
        </div>
        <div class="tweet-body">
            <p>{{ $post->body }}</p>
        </div>

        {{-- Show image if exists --}}
        @if($post->image)
            <div class="tweet-image">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            </div>
        @endif

        <div class="tweet-actions">
            <a href="{{ route('posts.edit', $post->id) }}">✏️ Edit</a>

            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">🗑 Delete</button>
            </form>
        </div>

        <a class="back-link" href="{{ route('posts.index') }}">← Back to posts</a>
    </div>
</body>
</html>
