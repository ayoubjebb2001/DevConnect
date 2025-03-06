<?php

namespace App\Livewire;

use App\Models\Hashtag;
use Livewire\Component;

class TrendingTags extends Component
{
    public function render()
    {
        $trendingTags = Hashtag::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->limit(5)
            ->get();

        return view('livewire.trending-tags', ['trendingTags' => $trendingTags]);
    }
}
