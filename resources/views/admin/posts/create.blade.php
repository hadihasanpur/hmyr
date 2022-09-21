@extends('admin.layouts.admin')

@section('title')
create products
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

    <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
        <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">ایجاد خبر</h5>
        </div>
        <hr>

        @include('admin.sections.errors')

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">عنوان خبر</label>
                        <input class="form-control" id="title" name="title" type="text" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="description">متن خبر</label>
                    <textarea class="form-control" id="description"
                        name="description">{{ old('description') }}</textarea>
                </div>



                {{-- Post Image Section --}}
                <div class="col-md-12">
                    <hr>
                    <p>تصاویر محصول : </p>
                </div>

                <div class="form-group col-md-3">
                    <label for="primary_image"> انتخاب تصویر اصلی </label>
                    <div class="custom-file">
                        <input type="file" name="primary_image" class="custom-file-input" id="primary_image">
                        <label class="custom-file-label" for="primary_image"> انتخاب فایل </label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="images"> انتخاب تصاویر </label>
                    <div class="custom-file">
                        <input type="file" name="images[]" multiple class="custom-file-input" id="images">
                        <label class="custom-file-label" for="images"> انتخاب فایل ها </label>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label for="is_active">وضعیت</label>
                    <select class="form-control" id="is_active" name="is_active">
                        <option value="1" selected>فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                </div>
            </div>

            <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
        </form>
    </div>

</div>

@endsection