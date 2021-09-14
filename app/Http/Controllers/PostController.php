<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('store');
    }

    public function index()
    {
        $posts=Post::with('user')->latest()->get();
        return PostResource::collection($posts);
    }

    public function store(Request $request)
    {
       $this->validate($request, [
            'body' => ['required']
        ]);
        $post=$request->user()->posts()->create($request->only('body'));
        return new PostResource($post);
    }
}
