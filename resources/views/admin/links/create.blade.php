@extends('admin.layouts.admin')
@section('title')
پیوند جدید
@endsection

@section('content')
<!-- Content Row -->
<div class="row">
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">پیوند جدید</h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        <form action="{{ route('admin.links.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="title">عنوان </label>
                        <input class="form-control" id="title" name="title" type="text" value="{{ old('title') }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="link">پیوند </label>
                        <input class="form-control" id="link" name="link" type="text" value="{{ old('link') }}">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="is_active">وضعیت</label>
                        <select class="form-control" id="is_active" name="is_active">
                            <option value="1" selected>فعال</option>
                            <option value="0">غیرفعال</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="group">گروه پیوندها</label>
                        <select class="form-control" id="group" name="group">
                            <option value="لینک های مهم" selected> مهم</option>
                            <option value=" خبرگزاریها"> خبرگزاریها</option>
                            <option value="شهرداریها">شهرداریها</option>
                            <option value="فرمانداریها">فرمانداریها</option>
                            <option value="فالو">  فالوبک</option>
                        </select>
                    </div>
                </div>
            </div>
            <button class="mt-5 btn btn-outline-primary" type="submit">ثبت</button>
            <a href="{{ route('admin.links.index') }}" class="mt-5 mr-3 btn btn-dark">بازگشت</a>
        </form>
    </div>
</div>
@endsection