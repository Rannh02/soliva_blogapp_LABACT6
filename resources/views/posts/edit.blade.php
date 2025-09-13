<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    <h1>Edit Post</h1>

    @if($errors->any())
        <div>{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Title</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}">

        <label for="content">Content</label>
        <textarea name="content">{{ old('content', $post->content) }}</textarea>

        <label for="image">Upload Image</label>
        <input type="file" name="image">

        @if($post->image)
            <div class="current-image">
                <p>Current Image:</p>
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" style="max-width: 300px; border-radius: 8px; margin: 10px 0;">
            </div>
        @endif

        <button type="submit">Update Post</button>
        
    </form>
</body>
</html>
