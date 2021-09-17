<?php

namespace App\Events;

use App\Models\Post;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostLiked implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $post;


    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    public function broadcastWith()
    {
        return[
          'post_id'=>$this->post->id,
          'likes'=>$this->post->likes->count()
        ];
    }

    public function broadcastOn()
    {
        return new Channel('posts');
    }
}
