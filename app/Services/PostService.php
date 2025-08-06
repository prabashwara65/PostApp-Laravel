<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostService
{
    public function createPost(array $data): void
    {
        $data['title'] = strip_tags($data['title']);
        $data['body'] = strip_tags($data['body']);
        $data['user_id'] = Auth::id();

        Post::create($data);
    }

    public function updatePost(Post $post, array $data): void
    {
        $data['title'] = strip_tags($data['title']);
        $data['body'] = strip_tags($data['body']);
        $post->update($data);
    }

    public function deletePost(Post $post): void
    {
        if (auth()->id() === $post->user_id) {
            $post->delete();
        }
    }
}
