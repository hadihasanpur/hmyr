@extends('admin.layouts.admin')

@section('title')
create Auctions
@endsection

@section('script')
<script>
    $('#file').change(function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

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

    <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
        <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">مزایده جدید</h5>
        </div>
        <hr>

        @include('admin.sections.errors')

        <form action="{{ route('admin.departments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">قسمت مربوطه </label>
                        <input class="form-control" id="title" name="title" type="text" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="description">شرح وظایف</label>
                    <textarea class="form-control" id="body" name="body">{{ old('description') }}</textarea>
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="description"> مدیر مربوطه</label>
                    <textarea class="form-control" id="body" name="body">{{ old('manager') }}</textarea>
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="description"> عنوان شغلی </label>
                    <textarea class="form-control" id="body" name="body">{{ old('ad') }}</textarea>
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="description"> مدرک تحصیلی </label>
                    <textarea class="form-control" id="body" name="body">{{ old('post') }}</textarea>
                </div>
                <div class="form-group col-md-3">
                    <label for="primary_image"> انتخاب تصویر اصلی </label>
                    <div class="custom-file">
                        <input type="file" name="mage" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="image"> انتخاب تصویر مدیر مربوطه </label>
                    </div>
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="description">آدرس </label>
                    <textarea class="form-control" id="address" name="address">{{ old('address') }}</textarea>
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="description">شماره دقتر </label>
                    <textarea class="form-control" id="tel1" name="address">{{ old('tel1') }}</textarea>
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="description">شماره داخلی </label>
                    <textarea class="form-control" id="tel2" name="address">{{ old('tel2') }}</textarea>
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="description">شماره همراه </label>
                    <textarea class="form-control" id="tel2" name="address">{{ old('tel2') }}</textarea>
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="description">شماره نمابر </label>
                    <textarea class="form-control" id="tel2" name="address">{{ old('tel2') }}</textarea>
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="description">صندوق پستی </label>
                    <textarea class="form-control" id="email" name="address">{{ old('email') }}</textarea>
                </div>

            </div>

            <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
            <a href="{{ route('admin.deartments.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
        </form>
    </div>

</div>

@endsection