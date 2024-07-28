@extends('admin.layouts.admin')

@section('title')
پروژه های اجرا شده سازمان
@endsection

@section('script')
<script>
        $('#DateFrom1').MdPersianDateTimePicker({
        targetTextSelector: '#InputDateFrom1',
        englishNumber: true,
        enableTimePicker: true,
                textFormat: 'yyyy-MM-dd HH:mm:ss',

        });
        $('#DateFrom2').MdPersianDateTimePicker({
        targetTextSelector: '#InputDateFrom2',
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
            <h5 class="font-weight-bold">پروژه جدید</h5>
        </div>
        <hr>

        @include('admin.sections.errors')

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="project">نام پروژه </label>
                        <input class="form-control" id="project" name="project" type="text"
                            value="{{ old('project') }}">
                    </div>
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="employer"> کارفرما</label>
                    <input class="form-control" id="employer" name="employer" type="text" value="{{ old('employer') }}">
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="consultant">مشاور</label>
                    <input class="form-control" id="consultant" name="consultant" type="text" value="{{ old('consultant') }}">
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="location"> محل اجرا </label>
                    <input class="form-control" id="location" name="location" type="text" valur="{{ old('location') }}">
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="cost"> هزینه اجرا</label>
                    <input class="form-control" id="cost" name="cost" type="text" value="{{ old('cost') }}">
                </div>
                <div class="mt-4 row">
                    <div class="input-group col-md-4">
                        <label class="mt-1 ml-1"> تاریخ شروع : </label>
                        <div class="order-2 text-center input-group-prepend">
                            <span class="input-group-text" id="DateFrom1">
                                <i class="fas fa-clock"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="InputDateFrom1" name="Projectstart"
                            value="{{ verta(old('Projectstart')) }}">
                    </div>
                    <div class="input-group col-md-4">
                        <label class="mt-1 ml-1"> تاریخ پایان : </label>
                        <div class="order-2 text-center input-group-prepend">
                            <span class="input-group-text" id="DateFrom2">
                                <i class="fas fa-clock"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="InputDateFrom2" name="Projectend"
                            value="{{ verta(old('Projectend')) }}">
                    </div>
                </div>
            </div>
            <button class="mt-5 btn btn-outline-primary" type="submit">ثبت</button>
            <a href="{{ route('admin.projects.index') }}" class="mt-5 mr-3 btn btn-dark">بازگشت</a>
        </form>
    </div>

</div>

@endsection