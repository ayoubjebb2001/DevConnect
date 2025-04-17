<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class SkillsSection extends Component
{
    public User $user;
    
    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function removeSkill($skillId)
    {
        if (Auth::id() === $this->user->id) {
            $this->user->skills()->detach($skillId);
            $this->dispatch('skill-removed');
        }
    }
    #[On('skill-added')]
    public function render()
    {
        return view('livewire.skills-section', [
            'skills' => $this->user->skills
        ]);
    }
}
