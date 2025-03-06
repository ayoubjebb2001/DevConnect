<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentPost extends Component
{
    public Post $post;
    public string $content = '';

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function addComment()
    {
        $this->validate([
            'content' => 'required|min:3'
        ]);

        $this->post->comments()->create([
            'user_id' => Auth::id(),
            'content' => $this->content
        ]);

        $this->content = '';
        $this->dispatch('commentAdded');
    }
    public function render()
    {
        return view('livewire.comment-post');
    }
}
