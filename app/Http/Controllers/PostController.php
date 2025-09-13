<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'title'   => 'required|string|max:255',
        'content' => 'nullable|string',
        'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
    $path = $request->file('image')->store('posts', 'public');
    $validated['image'] = $path;  // Must be 'image'
}


    Post::create($validated);

    return redirect()->route('posts.index')->with('success', 'Post created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Post $post)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    // Update fields
    $post->title = $validated['title'];
    $post->content = $validated['content'];

    // Handle new image if uploaded
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('posts', 'public');
        $post->image = $path;
    }

    $post->save();

    // Redirect back to index with success message
    return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}