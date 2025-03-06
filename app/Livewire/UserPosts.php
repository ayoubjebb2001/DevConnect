<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserPosts extends Component
{
    use WithPagination;

    public User $user;
    
    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        $posts = $this->user->posts()
            ->with(['likes', 'comments', 'hashtags'])
            ->latest()
            ->paginate(5);

        return view('livewire.user-posts', [
            'posts' => $posts
        ]);
    }
}