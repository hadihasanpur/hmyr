<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostShow extends Component
{
    public function render()
    {
        return view('livewire.post-show', [
            'posts' => Post::orderBy('created_at', 'ASC')->paginate(6)
        ]);
    }
}
