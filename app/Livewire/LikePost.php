<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class LikePost extends Component
{

    public Post $post;
    public $liked = false;
    public function mount(Post $post)
    {
        $this->post = $post;
        $this->liked = $post->likes()->where('user_id', Auth::id())->exists();
    }

    public function toggleLike()
    {
        if ($this->liked) {
            $this->post->likes()->where('user_id', Auth::id())->delete();
            $this->liked = false;
          
        } else {
            $this->post->likes()->create(['user_id' => Auth::id()]);
            $this->liked = true;
    
        }
        $this->post->refresh();
    }
    public function render()
    {
        return view('livewire.like-post');
    }
}
