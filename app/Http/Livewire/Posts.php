<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Posts extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $title;
    public $body;
    public $image;
    public $postId = null;
    public $newImage;
    public $showModalForm = false;

    public function showCreatePostModal()
    {
        $this->showModalForm = true;
    }
    public function updatedShowModalForm()
    {
        $this->reset();
    }
    public function storePost()
    {
        $this->validate([
            'title' => 'required',
            'body'  => 'required',
            'image' => 'required|image|max:1024'
            //'image' => 'max:1024'
        ]);

        if ($this->image) {
            $extension = $this->image->getClientOriginalExtension();
            $fileNameToStore = 'hmyr' . '_' . time() . '_' . date('Y-m-d') . '.' . $extension;
            $this->image->storeAs('public/photos/', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->title = $this->title;
        $post->slug = Str::slug($this->title);
        $post->body = $this->body;
        $post->image = $fileNameToStore;
        $post->save();
        $this->reset();
        return redirect('/admin/posts')->with('save', 'Post successfully created!');
    }
    public function updatePost()
    {
        $this->validate([
            'title' => 'required',
            'body'  => 'required',
            'image' => 'image|max:1024|nullable'
        ]);
        if ($this->image) {
            if ($this->image != 'noimage.png') {
                $this->newImage = $this->image->getClientOriginalName();
                $this->image->storeAs('public/photos/', $this->newImage);
            } else {

                unlink('storage/photos/' . $this->newImage);
            }
            Storage::delete('public/photos/', $this->newImage);
            $this->newImage = $this->image->getClientOriginalName();
            $this->image->storeAs('public/photos/', $this->newImage);
        }

        Post::find($this->postId)->update([
            'title' => $this->title,
            'body'  => $this->body,
            'image' => $this->newImage
        ]);
        $this->reset();
        return redirect('/admin/posts')->with('info', 'Post updated Successfully!');
    }
    public function deletePost($id)
    {
        $post = Post::find($id);
        if ($post->image != 'noimage.png') {
            unlink('storage/photos/' . $post->image);
        }
        Storage::delete('public/photos/', $post->image);
        $post->delete();
        //session()->flash('alert', 'Post deleted Successfully!');
        return redirect('/admin/posts')->with('alert', 'Post deleted Successfully!');
    }
    public function showEditPostModal($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->postId = $id;
        $this->loadEditForm();
    }
    public function loadEditForm()
    {
        $post = Post::findOrFail($this->postId);
        $this->title = $post->title;
        $this->body = $post->body;
        $this->newImage = $post->image;
    }

    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::orderBy('created_at', 'DESC')->paginate(6)
        ]);
    }
}
