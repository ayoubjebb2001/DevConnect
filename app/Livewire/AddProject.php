<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class AddProject extends ModalComponent
{
    public $title;
    public $description;

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'description' => 'required|min:10'
    ];

    public function save()
    {
        $this->validate();

        $user = Auth::user();
        $projects = json_decode($user->projects ?? '[]', true);
        
        $projects[] = [
            'id' => count($projects) ,
            'name' => $this->title,
            'description' => $this->description
        ];

        $user->projects = json_encode($projects);
        $user->save();

        $this->closeModal();
        $this->dispatch('project-added');
    }

    public function render()
    {
        return view('livewire.add-project');
    }
}