@extends('admin.layouts.admin')

@section('title')
ویرایش تصویر
@endsection
@section('script')
<script>
    // Show File Name
        $('#photo').change(function() {
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
    <div class="p-4 bg-white col-xl-12 col-md-12">
        
        @include('admin.sections.errors')
        <form action="{{ route('admin.galleries.update', ['gallery' => $gallery]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            {{-- Post Image Section --}}
            <div class="row">
                <div class="form-group col-md-3">
                    <div>
                        <img class="rounded" style="width: 100px;height: 100px"
                            src="{{ url(env('GALLERY_IMAGES_UPLOAD_PATH') . $gallery->photo) }}"
                            alt="{{ $gallery->name }}">
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="photo">تصویر قبلی </label>
                    <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="photo">
                        <label class="custom-file-label" for="photo"> ویرایش تصویر </label>
                    </div>
                </div>
                <div class="flex form-group col-md-3">
                    <label for="category">گروه بندی</label>
                    <select class="form-control" id="category" name="category">
                        <option value="hotel" selected>هتل مروارید</option>
                        <option value="beton" selected>کارخانه بتن صنعت</option>
                        <option value="omrani" selected>معاونت عمرانی</option>
                        <option value="javan">خانه جوان</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="is_active">وضعیت</label>
                    <select class="form-control" id="is_active" name="is_active">
                        <option value="1" selected>فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="name">توضیح تصویر</label>
                    <input class="form-control" id="description" name="description" type="text"
                        value="{{ $gallery->description }}">
                </div>
                
               
            </div>

            <div class="mt-3 text-left container-fluid">
                <button class="mt-2 btn btn-outline-primary" type="submit">ثبت</button>
                <a href="{{ route('admin.galleries.index') }}" class="mt-1 mr-2 btn btn-dark">بازگشت</a>
            </div>
        </form>
    </div>

</div>

@endsection