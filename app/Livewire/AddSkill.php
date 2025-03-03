<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;


class AddSkill extends ModalComponent
{
    public $name;

    protected $rules = [
        'name' => 'required|min:2|max:50',
    ];
    public function save()
    {
        $this->validate();

        $skill = Skill::firstOrCreate(
            ['name' => $this->name]
        );

        Auth::user->skills()->syncWithoutDetaching([$skill->id]);

        $this->closeModal();
        $this->dispatch('skill-added');
    }

    
    public function render()
    {
        return view('livewire.add-skill');
    }
}