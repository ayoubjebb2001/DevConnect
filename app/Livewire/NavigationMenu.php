<?php

namespace App\Livewire;

use Livewire\Component;

class NavigationMenu extends Component
{
    public $showingNavigationDropdown = false;

    public function toggleNavigationDropdown()
    {
        $this->showingNavigationDropdown = !$this->showingNavigationDropdown;
    }
    public function render()
    {
        return view('livewire.navigation-menu');
    }
}
