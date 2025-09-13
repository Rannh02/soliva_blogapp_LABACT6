<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Posts</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <div class="Logo">Blogsters</div>
        <div class="searchbar">
            <input type="text" placeholder="Search People you may know.">
        </div>
        <div class="profile">
            <ul>
                <li><a href="#">Notifications</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
    </header>

    <div class="container">
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Explore</a></li>
                    <li><a href="#">Notifications</a></li>
                    <li><a href="#">Messages</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </nav>
        </aside>

        <div class="main-content">
            <div class="create-post">
                <a href="{{ route('posts.create') }}">Create New Post</a>
            </div>

            @if(session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif

        
            <ul class="posts-list">
                @foreach($posts as $post)
                    <li>
                        <h3>{{ $post->title }}</h3>

                        
                        <p>{{ $post->content }}</p>

                        
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" 
                                 alt="{{ $post->title }}" 
                                 style="max-width:500px;">
                        @endif

                        <a href="{{ route('posts.show', $post->id) }}"
                        style="background-color:#444; color:whitesmoke; text-decoration:none; padding:5px; border-radius:15px;">VIEW</a>

                        <div class="likes">
                            <button onclick="likePost('{{ $post->id }}')">👍 Like</button>
                            <span id="like-count-{{ $post->id }}">0</span>
                        </div>

                        <div class="comments">
                            <h4>Comments</h4>
                            <ul id="comments-list-{{ $post->id }}"></ul>
                            <input type="text" id="comment-input-{{ $post->id }}" placeholder="Write a comment...">
                            <button onclick="addComment('{{ $post->id }}')">Post</button>
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script>

        function likePost(postId) {
            const likeCount = document.getElementById("like-count-" + postId);
            let count = parseInt(likeCount.innerText);
            count++;
            likeCount.innerText = count;
        }

        function addComment(postId) {
            const input = document.getElementById("comment-input-" + postId);
            const commentText = input.value.trim();
            if (commentText === "") return;

            const commentsList = document.getElementById("comments-list-" + postId);
            const newComment = document.createElement("li");
            newComment.textContent = commentText;

            commentsList.appendChild(newComment);
            input.value = "";
        }
    </script>
</body>
</html>
