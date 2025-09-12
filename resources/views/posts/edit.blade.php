<!DOCTYPE html>
<html>
<head><title>Edit Post</title></head>
<body>
    <h1>Edit Post</h1>
    @if($errors->any())
        <div>{{ $errors->first() }}</div>
    @endif
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Title:</label><input type="text" name="title" value="{{ $post->title }}"><br>
        <label>Body:</label><textarea name="body">{{ $post->body }}</textarea><br>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('posts.index') }}">Back</a>
</body>
</html>