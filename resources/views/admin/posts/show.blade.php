@extends('admin.layouts.admin')

@section('title')
نمایش خبر
@endsection

@section('script')

@endsection

@section('content')
<!-- Content Row -->
<div class="row">
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        @include('admin.sections.errors')
        <div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="d-none" for="name">پیش خبر</label>
                    <input class="form-control" type="text" value="{{$post->pre_title }}" disabled>
                </div>
            </div> 
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="d-none" for="name">عنوان خبر</label>
                    <input class="form-control" type="text" value="{{$post->title }}" disabled>
                </div>
            </div>
            <div class="form-floating">
                <label class="d-none" for="description">متن خبر</label>
                <textarea class="form-control" type="text" value="{{$post->description }}"
                    disabled>{{$post->description }}</textarea>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url(env('POST_IMAGES_UPLOAD_PATH') . $post->primary_image) }}"
                            alt="{{ $post->title }}">
                    </div>
                </div>
                @foreach ($images as $image)
                <div class="text-center col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url(env('POST_IMAGES_UPLOAD_PATH') . $image->image) }}"
                            alt="{{ $post->title }}">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="mt-1 text-left container-fluid">
            <a href="{{ route('admin.posts.index') }}" class="mt-1 mr-3 btn btn-dark">بازگشت</a>
        </div>
    </div>

</div>

@endsection