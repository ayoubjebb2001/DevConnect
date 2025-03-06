<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Hashtag;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;


class CreatePost extends Component
{
    use WithFileUploads;    
    public $title;
    public $content;
    public $hashtags;
    public $links;
    public $image;

    protected $rules = [
        'title' => 'required|string|min:5|max:255',
        'content' => 'required|string|min:5',
        'hashtags' => 'nullable|string',
        'links' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ];


    public function save()
    {
        $validated = $this->validate($this->rules);
        $post = auth()->user()->posts()->create($validated);
        if ($this->hashtags) {
            $hashtagArray = array_map('trim', explode(',', $this->hashtags));
            foreach ($hashtagArray as $tag) {
                $hashtag = Hashtag::firstOrCreate([
                    'name' => strtolower($tag)
                ]);
                $post->hashtags()->attach($hashtag->id);
            }
        }

        if ($this->image) {
            $post->image = $this->image->store('images', 'public');
            $post->save();
        }


        session()->flash('message', 'Post created successfully.');

        $this->reset();
        
        return redirect()->to('dashboard');

    }
    public function render()
    {
        return view('livewire.create-post');
    }
}
