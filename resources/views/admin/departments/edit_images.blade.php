@extends('admin.layouts.admin')

@section('title')
ویرایش تصاویر واحد
@endsection

@section('script')
<script>
    // Show File Name
        $('#avatar').change(function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });‍

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
            <h5 class="font-weight-bold">ویرایش تصاویر واحد : {{ $department->title }}</h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        {{-- Show Primary Image --}}
        <div class="row col-md-12 mb-1 text-center ">
            <div class="form-group col-md-3 card mx-auto">
                <h5 class="text-center">تصویر مدیر قسمت: </h5>
                <img class="img-thumbnail mx-auto" style="height: 200px;"
                    src="{{ url(env('DEPARTMENT_IMAGES_UPLOAD_PATH') . $department->avatar) }}"
                    alt="{{ $department->description }}">
                <form action="{{ route('admin.departments.images.storeAvatar',['department' => $department->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="custom-file">
                        <label class="custom-file-label" for="avatar"> جایگزینی تصویر مدیر واحد </label>
                        <input type="file" name="avatar" class="custom-file-input" id="avatar">
                    </div>
                    <button class="btn btn-outline-primary mt-3" type="submit">جایگزینی</button>
                </form>
            </div>
        </div>
        <hr>
        {{-- Show other Images --}}
        <div class="row">
            <h5 class="text-center mx-auto">تصاویر واحد : </h5>
        </div>
        <div class="row">
            @foreach ($department->images as $image)
            <div class="col-md-3 text-center">
                <div class="row mx-auto">
                    <div class="mx-auto text-center">
                        <img class="img-thumbnail mx-auto" style="height: 200px;width:200px"
                            alt="{{ $department->title }}"
                            src="{{ url(env('DEPARTMENT_IMAGES_UPLOAD_PATH') . $image->image) }}">
                    </div>

                    <div class="mx-auto">
                        <form
                            action="{{ route('admin.departments.images.destroy', ['department' => $department->id]) }}"
                            method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="department_id" value="{{ $image->id }}">
                            <button class="btn btn-danger btn-sm mb-3 mx-auto ml-2" type="submit">حذف</button>
                        </form>
                    </div>

                    <div class="">
                        <form
                            action="{{ route('admin.departments.images.underImage', ['department' => $department->id]) }}"
                            method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="department_id" value="{{ $image->id }}">
                            <input class="form-control mt-2" id="underImage" name="underImage" type="text"
                                value="{{ $image->underImage }}">
                            <button class="btn btn-success btn-sm mb-3 mx-auto" type="submit">اضافه کردن متن به
                                تصویر</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        <div class=" row mx-auto col-md-4">
            <form action="{{ route('admin.departments.images.add', ['department' => $department->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="images[]" multiple class="custom-file-input" id="images">
                        <label class="custom-file-label" for="images"> اضافه کردن تصاویر به واحد </label>
                    </div>
                </div>
                <div class="container-fluid text-left mt-3">
                    <button class="btn btn-outline-primary mt-2 text-center" type="submit">اضافه کن</button>
                    <a href="{{ route('admin.departments.index') }}" class="btn btn-dark mt-2 mr-3">بازگشت</a>
                </div>
                </form>
        </div>
        
    </div>
</div>
@endsection