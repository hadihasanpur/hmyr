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
        <div class="p-5 mb-4 bg-white col-xl-12 col-md-12 align-middle">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ویرایش تصاویر خبر : {{ $post->title }}</h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            {{-- Show Primary Image --}}
            <div class="row">
                <div class="mb-1 text-center row col-md-12">
                    <h5 class="text-center">تصویر اول و اصلی: </h5>
                    <img class="mx-auto img-thumbnail" style="height: 200px;"
                        src="{{ url(env('POST_IMAGES_UPLOAD_PATH') . $post->primary_image) }}"
                        alt="{{ $post->description }}">
                </div>
            </div>
            <hr>
            {{-- Show other Images --}}
            <div class="row mx-auto">
                @foreach ($post->postImages as $image)
                    <div class="text-center col col-auto">
                        <div class="mx-auto">
                            <div class="mx-auto text-center">
                                <img class="mx-auto img-thumbnail" style="height: 200px;width:200px"
                                    alt="{{ $post->title }}"
                                    src="{{ url(env('POST_IMAGES_UPLOAD_PATH') . $image->image) }}">
                            </div>
                            <div class="container">
                                <div class="row mx-auto">
                                    <div class="mx-auto">
                                        <form action="{{ route('admin.posts.images.set_primary', ['post' => $post->id]) }}"
                                            method="post">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="image_id" value="{{ $image->id }}">
                                            <button class="mb-1 btn btn-success btn-sm" type="submit">تصویر اصلی
                                            </button>
                                        </form>
                                    </div>
                                    <div class="mx-auto">
                                        <form action="{{ route('admin.posts.images.destroy', ['post' => $post->id]) }}"
                                            method="post">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="image_id" value="{{ $image->id }}">
                                            <button class="mx-auto  btn btn-danger btn-sm"
                                                type="submit">حذف</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr>
            <div class="mx-auto">
                <form action="{{ route('admin.posts.images.add', ['post' => $post->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mx-32  row">
                        <div class="form-group mx-auto">
                            <div class="custom-file">
                                <input type="file" name="primary_image" class="custom-file-input" id="primary_image">
                                <label class="custom-file-label" for="primary_image">انتخاب تصویر اصلی </label>
                            </div>
                        </div>
                        <div class="form-group mx-auto">
                            <div class="custom-file">
                                <input type="file" name="images[]" multiple class="custom-file-input" id="images">
                                <label class="custom-file-label" for="images"> انتخاب تصاویر </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-1 text-center container">
                    <div class="mx-24">
                        <button class="mt-2 text-center btn btn-outline-primary" type="submit">ویرایش</button>
                        <a href="{{ route('admin.posts.index') }}" class="mt-2 mr-3 btn btn-dark">بازگشت</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
