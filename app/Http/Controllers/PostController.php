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

    public function index(Request $request)
    {
        $posts = Post::with('user')
                     ->take(5)
                     ->skip($request->get('skip', 0) + (($request->get('page') - 1) * 5))
                     ->latest()
                     ->get();
        return PostResource::collection($posts);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => ['required']
        ]);
        $post = $request->user()->posts()->create($request->only('body'));
        return new PostResource($post);
    }
}
