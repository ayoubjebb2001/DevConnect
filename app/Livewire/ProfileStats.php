<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileStats extends Component
{
    public function render()
    {
        $stats = [
            'posts' => Auth::user()->posts()->count(),
            'connections' => Auth::user()->connections()->count(),
            'skills' => Auth::user()->skills()->count(),
            'projects' => count(json_decode(Auth::user()->projects,true))
        ];
        return view('livewire.profile-stats',['stats' => $stats]);
    }
}
