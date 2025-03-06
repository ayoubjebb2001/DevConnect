<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsFeed extends Component
{
    use WithPagination;

    public function render()
    {
        $posts = Post::with(['user', 'likes', 'comments', 'hashtags'])
            ->latest()
            ->paginate(10);

        return view('livewire.posts-feed', ['posts' => $posts]);
    }
}