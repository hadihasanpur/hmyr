

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
    <div class="p-5 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">ویرایش تصاویر واحد : {{ $level2->name }}</h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        {{-- Show Primary Image --}}
        <div class="mb-1 text-center row col-md-12 ">
            <div class="mx-auto form-group col-md-3 card">
                <h5 class="text-center">تصویر مدیر قسمت: </h5>
                <img class="mx-auto img-thumbnail" style="height: 200px;"
                    src="{{ url(env('UNIT_IMAGES_UPLOAD_PATH') . $level2->avatar) }}"
                    alt="{{ $level2->description }}">
                <form action="{{ route('admin.level2s.images.storeAvatar',['level2' => $level2->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="custom-file">
                        <label class="custom-file-label" for="avatar"> جایگزینی تصویر مدیر واحد </label>
                        <input type="file" name="avatar" class="custom-file-input" id="avatar">
                    </div>
                    <button class="mt-3 btn btn-outline-primary" type="submit">جایگزینی</button>
                </form>
            </div>
        </div>
        <hr>
        {{-- Show other Images --}}
        <div class="row">
            <h5 class="mx-auto text-center">تصاویر واحد : </h5>
        </div>
        <div class="row">
            @foreach ($level2->images as $image)
            <div class="text-center col-md-3">
                <div class="mx-auto row">
                    <div class="mx-auto text-center">
                        <img class="mx-auto img-thumbnail" style="height: 200px;width:200px"
                            alt="{{ $unit->title }}"
                            src="{{ url(env('LEVEL2_IMAGES_UPLOAD_PATH') . $image->image) }}">
                    </div>

                    <div class="mx-auto">
                        <form
                            action="{{ route('admin.units.images.destroy', ['level2' => $level2->id]) }}"
                            method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="unit_id" value="{{ $image->id }}">
                            <button class="mx-auto mb-3 ml-2 btn btn-danger btn-sm" type="submit">حذف</button>
                        </form>
                    </div>

                    <div class="">
                        <form
                            action="{{ route('admin.units.images.underImage', ['level2' => $level2->id]) }}"
                            method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="department_id" value="{{ $image->id }}">
                            <input class="mt-2 form-control" id="underImage" name="underImage" type="text"
                                value="{{ $image->underImage }}">
                            <button class="mx-auto mb-3 btn btn-success btn-sm" type="submit">اضافه کردن متن به
                                تصویر</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        <div class="mx-auto row col-md-4">
            <form action="{{ route('admin.level2s.images.add', ['level2' => $level2->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="images[]" multiple class="custom-file-input" id="images">
                        <label class="custom-file-label" for="images"> اضافه کردن تصاویر به واحد </label>
                    </div>
                </div>
                <div class="mt-3 text-left container-fluid">
                    <button class="mt-2 text-center btn btn-outline-primary" type="submit">اضافه کن</button>
                    <a href="{{ route('admin.level2s.index') }}" class="mt-2 mr-3 btn btn-dark">بازگشت</a>
                </div>
                </form>
        </div>
        
    </div>
</div>
@endsection