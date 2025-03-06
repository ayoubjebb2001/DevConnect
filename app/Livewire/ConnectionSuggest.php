<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ConnectionSuggest extends Component
{
    public function render()
    {

        $suggestions = User::whereNotIn('id', [Auth::id()])
            ->whereNotIn('id', Auth::user()->connections->pluck('id'))
            ->whereNotIn('id', Auth::user()->pendingConnections->pluck('id'))
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('livewire.connection-suggest', [
            'suggestions' => $suggestions
        ]);
    }
}
