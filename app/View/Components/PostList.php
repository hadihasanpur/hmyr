<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class PostList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.post-list');
    }

    public function posts()
    {
       // $posts = Post::all()->orderByDesc('created_at');
        $posts = Post::orderBy('created_at', 'ASC')->limit(3)->get();
        return $posts;
    }
}
