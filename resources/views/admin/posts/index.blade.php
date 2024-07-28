@extends('admin.layouts.admin')
@section('title')
لیست کل اخبار
@endsection
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
        <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.posts.create') }}">
                <i class="fa fa-plus"></i>
                ایجاد خبر
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان خبر</th>
                        <th>تاریخ </th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $key => $post)
                    <tr>
                        <th class="font-titr">
                            <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                                {{ $posts->firstItem() + $key }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                                {{ $post->title }}
                            </a>
                        </th>
                        <th class="font-titr">
                            {{ verta($post->created_at)->format('H:i  _  Y/n/j') }}
                        </th>
                        <th>
                            <span class="{{ $post->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                {{ $post->is_active }}    
                            </span>
                        </th>
                        <th>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    عملیات
                                </button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}"
                                        class="dropdown-item text-right">
                                        ویرایش
                                    </a>
                                    <a href="{{ route('admin.posts.images.edit', ['post' => $post->id]) }}"
                                        class="dropdown-item text-right"> ویرایش تصاویر
                                    </a>
                                    <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="dropdown-item text-right">
                                        نمایش
                                    </a>
                                    <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger dropdown-item text-right"
                                            type="submit"><span class="badge bg-danger text-wrap text-white p-1">حذف کل خبر</span></button>
                                    </form>
                                </div>
                            </div>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-5 d-flex justify-content-center font-titr">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
        
        
    </div>
</div>
@endsection