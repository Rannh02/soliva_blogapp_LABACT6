<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title></head>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">

    <style>
        
    </style>
    
<body>
    <h1>Create New Post</h1>
    @if($errors->any())
        <div>{{ $errors->first() }}</div>
    @endif
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Title</label>
    <input type="text" name="title">

    <label for="content">Content</label>
    <textarea name="content"></textarea>

    <label for="image">Upload Image</label>
    <input type="file" name="image">

    <button type="submit">Create Post</button>
</form>


    
</body>
</html>