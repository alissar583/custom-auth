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
        $posts = auth()->user()->posts;
        return $posts;
    }
}
