<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProjectsSection extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    // public function deleteProject($projectId)
    // {
    //     if (Auth::id() === $this->user->id) {
    //         $this->user->projects()->where('id', $projectId)->delete();
    //         $this->dispatch('project-deleted');
    //     }
    // }

    public function render()
    {
        return view('livewire.projects-section', [
            'projects' => $this->user->projects
        ]);
    }
}