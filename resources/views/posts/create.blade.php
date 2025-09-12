<!DOCTYPE html>
<html>
<head><title>Create Post</title></head>
<body>
    <h1>Create New Post</h1>
    @if($errors->any())
        <div>{{ $errors->first() }}</div>
    @endif
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label>Title:</label><input type="text" name="title"><br>
        <label>Body:</label><textarea name="body"></textarea><br>
        <button type="submit">Save</button>
    </form>
    <a href="{{ route('posts.index') }}">Back</a>
</body>
</html>