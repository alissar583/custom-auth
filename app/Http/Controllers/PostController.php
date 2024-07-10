<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeStatusRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct()
    {
        $this->postService = app(PostService::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = $this->postService->index();
        $response = PostResource::collection($response)->response()->getData();
        return $this->successResponse($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $this->authorize('view', $post);
        $post = $this->postService->show($post);
        $post = PostResource::make($post);
        return $this->successResponse($post);
    }


    public function changeStatus(ChangeStatusRequest $request, Post $post)
    {
        $this->postService->changeStatus($request->validated(), $post);
        return $this->successResponse();
    }

}
