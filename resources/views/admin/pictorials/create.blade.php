@extends('admin.layouts.admin')

@section('title')
ایجاد گزارش تصویری
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
    <div class="p-4 bg-white col-xl-12 col-md-12">
        <div class="mb-1 text-md-right">
            <h5 class="text-center font-weight-bold">ایجاد گزارش تصویری</h5>
        </div>
        @include('admin.sections.errors')
        <form action="{{ route('admin.pictorials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">عنوان گزارش خبری</label>
                        <input class="form-control" id="title" name="title" type="text" value="{{ old('title') }}">
                    </div>
                </div>
                
                {{-- pictorials Image Section --}}
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="primary_image"> انتخاب تصویر اصلی </label>
                        <div class="custom-file">
                            <input type="file" name="primary_image" class="custom-file-input" id="primary_image">
                            <label class="custom-file-label" for="primary_image"> انتخاب فایل </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="images"> انتخاب تصاویر </label>
                        <div class="custom-file">
                            <input type="file" name="images[]" multiple class="custom-file-input" id="images">
                            <label class="custom-file-label" for="images"> انتخاب فایل ها </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="is_active">وضعیت</label>
                        <select class="form-control" id="is_active" name="is_active">
                            <option value="1" selected>فعال</option>
                            <option value="0">غیرفعال</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mt-3 text-left container-fluid">
                <button class="mt-2 btn btn-outline-primary" type="submit">ثبت</button>
                <a href="{{ route('admin.pictorials.index') }}" class="mt-1 mr-2 btn btn-dark">بازگشت</a>
            </div>
        </form>
    </div>

</div>

@endsection