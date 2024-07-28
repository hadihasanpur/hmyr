@extends('admin.layouts.admin')

@section('title')
ویرایش تصاویر خبر
@endsection

@section('script')
<script>
    // Show File Name
        $('#primary_image').change(function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

        $('#images').change(function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

</script>
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
        <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">ویرایش تصاویر خبر : {{ $post->title }}</h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        {{-- Show Primary Image --}}
        <div class="row">
            <div class="row col-md-12 mb-1 text-center">
                <h5 class="text-center">تصویر اول و اصلی: </h5>
                <img class="img-thumbnail mx-auto" style="height: 200px;"
                    src="{{ url(env('POST_IMAGES_UPLOAD_PATH') . $post->primary_image) }}"
                    alt="{{ $post->description }}">
            </div>
        </div>
        <hr>
        {{-- Show other Images --}}
        <div class="row">
            @foreach ($post->images as $image)
            <div class="col-md-3 text-center">
                <div class="row mx-auto">
                    <div class="mx-auto text-center">
                        <img class="img-thumbnail mx-auto" style="height: 200px;width:200px" alt="{{ $post->title }}"
                            src="{{ url(env('POST_IMAGES_UPLOAD_PATH') . $image->image) }}">
                    </div>

                    <div class="mx-1">
                        <form action="{{ route('admin.posts.images.destroy', ['post' => $post->id]) }}"
                            method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="image_id" value="{{ $image->id }}">
                            <button class="btn btn-danger btn-sm mb-3 mx-auto ml-2" type="submit">حذف</button>
                        </form>
                    </div>
                    <div class="">
                        <form action="{{ route('admin.posts.images.set_primary', ['post' => $post->id]) }}"
                            method="post">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="image_id" value="{{ $image->id }}">
                            <button class="btn btn-success btn-sm mb-3 mx-auto" type="submit">انتخاب به عنوان تصویر
                                اصلی</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        <form action="{{ route('admin.posts.images.add', ['post' => $post->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="primary_image" class="custom-file-input" id="primary_image">
                        <label class="custom-file-label" for="primary_image">انتخاب تصویر اصلی </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="images[]" multiple class="custom-file-input" id="images">
                        <label class="custom-file-label" for="images"> انتخاب تصاویر </label>
                    </div>
                </div>
            </div>
            <div class="container-fluid text-left mt-3">
                <button class="btn btn-outline-primary mt-2 text-center" type="submit">ویرایش</button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-dark mt-2 mr-3">بازگشت</a>
            </div>
        </form>
    </div>
</div>
@endsection