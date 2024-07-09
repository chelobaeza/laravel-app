<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Posts/Index', [
            'posts' => Post::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Log::channel('stderr')->info('Post content', [$post]);

        $request->validate([
            'title' => 'required'
        ]);
        
        $post->title = $request->title;
        $post->save();
        return redirect()->route('posts.edit', ['post' => $post->id ]);
    }

    /**
     * Ask for confirmation.
     */
    public function delete(Post $post)
    {
        Log::channel('stderr')->info('Post content', [$post]);
        return Inertia::render('Posts/Delete', [
            'post' => $post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
