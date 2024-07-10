<?php

namespace App\Services;

use App\Models\Post;

/**
 * Class PostService.
 */
class PostService
{

    public function index()
    {
        $posts = Post::with('user')->paginate(15);
        return $posts;
    }

    public function show(Post $post)
    {
        return $post->load('user');
    }

    public function changeStatus(array $data, Post $post)
    {
        $post->update([
            'status' => $data['status']
        ]);
    }
}
