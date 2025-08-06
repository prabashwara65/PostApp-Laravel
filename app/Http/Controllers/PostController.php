<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function displayForm()
    {
        return view('create');
    }

    public function createPost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $this->postService->createPost($validated);
        return redirect('/index');
    }

    public function putData(Post $post, Request $request)
    {
        if (auth()->id() !== $post->user_id) {
            return redirect('/index');
        }

        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $this->postService->updatePost($post, $validated);
        return redirect('/index');
    }

    public function deletePost(Post $post)
    {
        $this->postService->deletePost($post);
        return redirect('/index');
    }

    public function editScreen(Post $post)
    {
        return view('edit', ['post' => $post]);
    }
}
