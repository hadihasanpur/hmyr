@extends('admin.layouts.admin')
@section('title')
ویرایش خبر
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

        $('#DateFrom').MdPersianDateTimePicker({
        targetTextSelector: '#InputDateFrom',
        englishNumber: true,
        enableTimePicker: true,
        textFormat: 'yyyy-MM-dd HH:mm:ss',
        });
        
</script>
@endsection
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">ویرایش خبر</h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        <form action="{{ route('admin.posts.update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">پیش خبر</label>
                        <input class="form-control" id="pre_title" name="pre_title" type="text" value="{{ $post->pre_title }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">عنوان خبر</label>
                        <input class="form-control" id="title" name="title" type="text" value="{{ $post->title }}">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="abstract">چکیده</label>
                    <textarea class="form-control" id="abstract"
                        name="abstract">{{ $post->abstract }}</textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="description">متن </label>
                    <textarea class="form-control" id="description"
                        name="description">{{ $post->description }}</textarea>
                </div>
                <div class="form-group row">
                    <div class="col-md-7">
                        <div class="input-group">
                            <label class="m-2"> تاریخ درج خبر </label>
                            <div class="order-2 input-group-prepend">
                                <span class="input-group-text" id="DateFrom">
                                    <i class="fas fa-clock"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="InputDateFrom" name="created_at"
                                value="{{ $post->created_at == null ? null : verta($post->created_at) }}">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="order-2 input-group-prepend">
                            <label for="is_active" class="m-2">وضعیت</label>
                                <select class="form-control" id="is_active" name="is_active">
                                    <option value="1" selected>فعال</option>
                                    <option value="0">غیرفعال</option>
                                </select>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <button class="mt-5 btn btn-outline-primary" type="submit">ثبت</button>
            <a href="{{ route('admin.posts.index') }}" class="mt-5 mr-3 btn btn-dark">بازگشت</a>
        </form>
        
    </div>
</div>
@endsection