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
    public $img1;
    public $img2;
    public $img3;
    public $img4;
    public $img5;
    public $img6;
    public $img7;
    public $img8;
    public $img9;
    public $img10;
    public $alt1, $alt2, $alt3, $alt4, $alt5, $alt6, $alt7, $alt8, $alt9, $alt10;
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
            'img1'  => 'required|image|max:1024',
            'img2'  => 'max:1024',
            'img3'  => 'max:1024',
            'img4'  => 'max:1024',
            'img5'  => 'max:1024',
            'img6'  => 'max:1024',
            'img7'  => 'max:1024',
            'img8'  => 'max:1024',
            'img9'  => 'max:1024',
            'img10' => 'max:1024'
        ]);
        if ($this->img1) {
            $extension = $this->img1->getClientOriginalExtension();
            $fileNameToStore1 = time() . '_' . date('Y-m-d') . '.' . $extension;
            $this->img1->storeAs('public/photos/', $fileNameToStore1);
        } else {
            $fileNameToStore = 'noimg1.png';
        }
        if ($this->img2) {
            $extension = $this->img2->getClientOriginalExtension();
            $fileNameToStore2 = time() . '_' . date('Y-m-d') . '.' . $extension;
            $this->img2->storeAs('public/photos/', $fileNameToStore2);
        } else {
            $fileNameToStore2 = '';
        }
        if ($this->img3) {
            $extension = $this->img3->getClientOriginalExtension();
            $fileNameToStore3 = time() . '_' . date('Y-m-d') . '.' . $extension;
            $this->img3->storeAs('public/photos/', $fileNameToStore3);
        } else {
            $fileNameToStore3 = '';
        }
        if ($this->img4) {
            $extension = $this->img4->getClientOriginalExtension();
            $fileNameToStore4 = time() . '_' . date('Y-m-d') . '.' . $extension;
            $this->img4->storeAs('public/photos/', $fileNameToStore4);
        } else {
            $fileNameToStore4 = '';
        }
        if ($this->img5) {
            $extension = $this->img5->getClientOriginalExtension();
            $fileNameToStore5 = time() . '_' . date('Y-m-d') . '.' . $extension;
            $this->img5->storeAs('public/photos/', $fileNameToStore5);
        } else {
            $fileNameToStore5 = '';
        }
        if ($this->img6) {
            $extension = $this->img6->getClientOriginalExtension();
            $fileNameToStore6 = time() . '_' . date('Y-m-d') . '.' . $extension;
            $this->img6->storeAs('public/photos/', $fileNameToStore6);
        } else {
            $fileNameToStore6 = '';
        }
        if ($this->img7) {
            $extension = $this->img7->getClientOriginalExtension();
            $fileNameToStore7 = time() . '_' . date('Y-m-d') . '.' . $extension;
            $this->img7->storeAs('public/photos/', $fileNameToStore7);
        } else {
            $fileNameToStore7 = '';
        }
        if ($this->img8) {
            $extension = $this->img8->getClientOriginalExtension();
            $fileNameToStore8 = time() . '_' . date('Y-m-d') . '.' . $extension;
            $this->img8->storeAs('public/photos/', $fileNameToStore8);
        } else {
            $fileNameToStore8 = '';
        }
        if ($this->img9) {
            $extension = $this->img9->getClientOriginalExtension();
            $fileNameToStore9 = time() . '_' . date('Y-m-d') . '.' . $extension;
            $this->img9->storeAs('public/photos/', $fileNameToStore9);
        } else {
            $fileNameToStore9 = '';
        }
        if ($this->img10) {
            $extension = $this->img10->getClientOriginalExtension();
            $fileNameToStore10 = time() . '_' . date('Y-m-d') . '.' . $extension;
            $this->img10->storeAs('public/photos/', $fileNameToStore10);
        } else {
            $fileNameToStore10 = '';
        }
        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->title = $this->title;
        $post->slug = Str::slug($this->title);
        $post->body = $this->body;
        $post->img1 = $fileNameToStore1;
        $post->img2 = $fileNameToStore2;
        $post->img3 = $fileNameToStore3;
        $post->img4 = $fileNameToStore4;
        $post->img5 = $fileNameToStore5;
        $post->img6 = $fileNameToStore6;
        $post->img7 = $fileNameToStore7;
        $post->img8 = $fileNameToStore8;
        $post->img9 = $fileNameToStore9;
        $post->img10 = $fileNameToStore10;
        $post->alt1 = $this->alt1;
        $post->alt2 = $this->alt2;
        $post->alt3 = $this->alt3;
        $post->alt4 = $this->alt4;
        $post->alt5 = $this->alt5;
        $post->alt6 = $this->alt6;
        $post->alt7 = $this->alt7;
        $post->alt8 = $this->alt8;
        $post->alt9 = $this->alt9;
        $post->alt10 = $this->alt10;
        $post->save();
        $this->reset();
        return redirect('/admin/posts')->with('save', 'Post successfully created!');
    }
    public function updatePost()
    {
        $this->validate([
            'title' => 'required',
            'body'  => 'required',
            'img1' => 'image|max:1024|nullable'
        ]);
        if ($this->img1) {
            if ($this->img1 != 'noimg1.png') {
                $this->newImage = $this->img1->getClientOriginalName();
                $this->img1->storeAs('public/photos/', $this->newImage);
            } else {

                unlink('storage/photos/' . $this->newImage);
            }
            Storage::delete('public/photos/', $this->newImage);
            $this->newImage = $this->img1->getClientOriginalName();
            $this->img1->storeAs('public/photos/', $this->newImage);
        }

        Post::find($this->postId)->update([
            'title' => $this->title,
            'body'  => $this->body,
            'img1' => $this->newImage
        ]);
        $this->reset();
        return redirect('/admin/posts')->with('info', 'Post updated Successfully!');
    }
    public function deletePost($id)
    {
        $post = Post::find($id);
        if ($post->img1 != 'noimg1.png') {
            unlink('storage/photos/' . $post->img1);
        }
        Storage::delete('public/photos/', $post->img1);
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
        $this->newImage = $post->img1;
    }

    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::orderBy('created_at', 'DESC')->paginate(6)
        ]);
    }
}
