<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\PostImageController;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(20);
        return view('admin.posts.index', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        return view('admin.posts.create', compact('posts'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'is_active' => 'required',
            'primary_image' => 'required|mimes:jpg,jpeg,png,svg',
        ]);
        try {
            DB::beginTransaction();
            $postImageController = new PostImageController();
            $fileNameImages = $postImageController->upload($request->primary_image, $request->images);
            //dd($fileNameImages);
            $post = Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'primary_image' => $fileNameImages['fileNamePrimaryImage'],
                'is_active' => $request->is_active,
            ]);
                foreach ($fileNameImages['fileNameImages'] as $fileNameImage) {
                    PostImage::create([
                        'post_id' => $post->id,
                        'image' => $fileNameImage
                    ]);
                }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ایجاد خبر', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('خبر مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->route('admin.posts.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $images = $post->images;
        return view('admin.posts.show', compact('post', 'images'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'is_active' => 'required',
            'created_at' => 'nullable|date',
        ]);
        try {
            DB::beginTransaction();
            $post->update([
                'title' => $request->title,
                'description' => $request->description,
                'is_active' => $request->is_active,
                // 'created_at' => convertShamsiToGregorianDate($post('created_at')),
                'created_at' => convertShamsiToGregorianDate($request->created_at)
                // ' date_on_sale_from' => convertShamsiToGregorianDate($value['date_on_sale_from']),
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش خبر', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('خبر مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('admin.posts.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        alert()->success('خبر مورد نظر حذف شد', 'باتشکر');
        return redirect()->route('admin.posts.index');
    }
}
