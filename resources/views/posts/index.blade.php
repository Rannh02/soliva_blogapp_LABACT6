<!DOCTYPE html>
<html>
<head><title>Blog Posts</title></head>
<body>
    <h1>Blog Posts</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <a href="{{ route('posts.create') }}">Create New Post</a>
    <ul>
        @foreach($posts as $post)
            <li>{{ $post->title }} - <a href="{{ route('posts.show', $post->id) }}">View</a></li>
        @endforeach
    </ul>
</body>
</html>