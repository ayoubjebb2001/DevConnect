<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SendConnection extends Component
{
    public User $user;
    public bool $isPending = false;
    public bool $isConnected = false;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->isPending = Auth::user()->hasPendingConnectionWith($this->user);
        $this->isConnected = Auth::user()->isConnectedWith($this->user);
    }

    public function sendRequest()
    {
        Auth::user()->sendConnectionRequest($this->user);
        $this->isPending = true;
    }

    public function render()
    {
        return view('livewire.send-connection');
    }
}