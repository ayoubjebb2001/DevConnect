<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;


class AddSkill extends ModalComponent
{
    public $name;
    public $category;

    protected $rules = [
        'name' => 'required|min:2|max:50',
        'category' => 'required|in:Language,Framework,Tool,Other'
    ];

    public function save()
    {
        $this->validate();

        $skill = Skill::firstOrCreate(
            ['name' => $this->name],
            ['category' => $this->category]
        );

        Auth::user()->skills()->syncWithoutDetaching([$skill->id]);

        $this->closeModal();
        $this->dispatch('skill-added');
    }

    
    public function render()
    {
        return view('livewire.add-skill');
    }
}