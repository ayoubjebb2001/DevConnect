<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ProjectsSection extends Component
{
    public User $user;
    public $projects;

    protected $listeners = [
        'project-added' => 'refreshProjects',
        'project-deleted' => 'refreshProjects'
    ];



    public function mount(User $user)
    {
        $this->user = $user;
        $this->projects = json_decode($user->projects, true);
    }

    public function deleteProject($index)
    {
        if (Auth::id() === $this->user->id) {
            $projects = json_decode($this->user->projects, true);
            array_splice($projects, $index, 1);
            
            $this->user->projects = json_encode($projects);
            $this->user->save();
            
            $this->refreshProjects();
            $this->dispatch('project-deleted');
        }
    }

    public function refreshProjects()
    {
        $this->projects = json_decode($this->user->projects, true);
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