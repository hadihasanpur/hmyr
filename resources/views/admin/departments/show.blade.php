@extends('admin.layouts.admin')

@section('title')
واحد جدید
@endsection
@section('script')
<script>
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
            <h5 class="font-weight-bold">ویرایش واحد</h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        <form action="{{ route('admin.departments.update', ['department' => $department]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="container text-center">
                    <div class="row">
                        <div class="form-group col-8 mx-auto">
                            <label for="name">عنوان واحد</label>
                            <input class="form-control" id="title" name="title" type="text"
                                value="{{ $department->title }}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="body">توضیحات یا خلاصه ای از شرح وظایف واحد</label>
                            <textarea class="form-control" id="description"
                                name="description" disabled>{{ $department->description }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="body"> نام و نام خانوادگی مدیر واحد</label>
                            <input class="form-control" id="manager" name="manager" value="{{ $department->manager }}" disabled>
                        </div>
                        <div class="form-group col">
                            <label for="ad">مدرک تحصیلی</label>
                            <input class="form-control" id="ad" name="ad" value="{{ $department->ad }}" disabled>
                        </div>
                        <div class="form-group col">
                            <label for="body">پست سازمانی </label>
                            <input class="form-control" id="post" name="post" value="{{ $department->post }}" disabled>
                        </div>
                        <div class="form-group col">
                            <label for="body">صندوق پستی </label>
                            <input class="form-control" id="email" name="email" value="{{ $department->email }}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="body">شماره تلفن</label>
                            <input class="form-control" id="tel1" name="tel1" value="{{ $department->tel1 }}" disabled>
                        </div>
                        <div class="form-group col">
                            <label for="body">شماره تلفن ذاخلی </label>
                            <input class="form-control" id="tel2" name="tel2" value="{{ $department->tel2 }}" disabled>
                        </div>
                        <div class="form-group col">
                            <label for="body">شماره موبایل </label>
                            <input class="form-control" id="mobile" name="mobile" value="{{ $department->mobile }}" disabled>
                        </div>
                        <div class="form-group col">
                            <label for="body">نمایر </label>
                            <input class="form-control" id="fax" name="fax" value="{{ $department->fax }}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="body">آدرس </label>
                            <input class="form-control" id="address" name="address" value="{{ $department->address }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ url(env('DEPARTMENT_IMAGES_UPLOAD_PATH') . $department->avatar) }}"
                                    alt="{{ $department->title }}">
                            </div>
                        </div>
                        @foreach ($images as $image)
                        <div class="col-md-3 text-center">
                            <div class="card">
                                <img class="card-img-top" src="{{ url(env('DEPARTMENT_IMAGES_UPLOAD_PATH') . $image->image) }}"
                                    alt="{{ $department->title }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{ route('admin.departments.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
        </form>
    </div>
</div>
@endsection