<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only('store');
    }

    public function store(Request $request, Post $post)
    {
        $like = $post->likes()->make();
        $like->user()->associate($request->user());
        $like->save();

        return response()->json([
            'likes'=>$post->likes->count()
                                ]);
    }
}
