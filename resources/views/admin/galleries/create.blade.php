@extends('admin.layouts.admin')

@section('title')
ایجاد خبر
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
    <div class="col-xl-12 col-md-12 p-4 bg-white h-40">
        <div class="mb-1  text-md-right">
            <h5 class="font-weight-bold text-center">افزودن تصویر به گالری</h5>
        </div>
        @include('admin.sections.errors')
        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="photo"> انتخاب تصویر 1 </label>
                    <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="photo">
                        <label class="custom-file-label" for="photo"> انتخاب فایل </label>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="name">توضیح تصویر</label>
                    <input class="form-control" id="description" name="description" type="text"
                        value="{{ old('description') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="is_active">وضعیت</label>
                    <select class="form-control" id="is_active" name="is_active">
                        <option value="1" selected>فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="category">گروه بندی</label>
                    <select class="form-control" id="category" name="category">
                        <option value="hotel" selected>هتل مروارید</option>
                        <option value="beton" selected>کارخانه بتن صنعت</option>
                        <option value="omrani" selected>معاونت عمرانی</option>
                        <option value="javan">خانه جوان</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-outline-primary mt-2" type="submit">ثبت</button>
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-dark mt-1 mr-2">بازگشت</a>
        </form>
    </div>

</div>

@endsection