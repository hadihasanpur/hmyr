@extends('admin.layouts.admin')

@section('title')
واحد جدید 
@endsection

@section('script')
<script>
    $('#avatar').change(function() {
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
        @include('admin.sections.errors')

        <form action="{{ route('admin.departments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="form-row">
                    <div class="form-group col-md-8 mx-auto">
                        <label for="name"> عنوان قسمت مربوطه </label>
                        <input class="form-control" id="title" name="title" type="text" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="description">شرح وظایف</label>
                    <textarea class="form-control" rows="5" id="description" name="description">{{ old('description') }}</textarea>
                </div>
                <div class="row">
                    <div class="form-gro‍up col-md-3">
                        <label for="description"> مدیر مربوطه</label>
                        <input class="form-control" id="manager" name="manager">{{ old('manager') }}</input>
                    </div>
                    <div class="form-gro‍up col-md-3">
                        <label for="description">مدرک تحصیلی </label>
                        <input class="form-control" id="ad" name="ad">{{ old('ad') }}</textarea>
                    </div>
                    <div class="form-gro‍up col-md-3">
                        <label for="description"> پست سازمانی</label>
                        <input class="form-control" id="post" name="post">{{ old('post') }}</textarea>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="avatar"> انتخاب تصویر اصلی </label>
                        <div class="custom-file">
                            <input type="file" name="avatar" class="custom-file-input" id="avatar">
                            <label class="custom-file-label" for="avatar"> انتخاب تصویر مدیر مربوطه </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-gro‍up col-md-3">
                        <label for="description">شماره دفتر </label>
                        <input class="form-control" id="tel1" name="tel1">{{ old('tel1') }}</input>
                    </div>
                    <div class="form-gro‍up col-md-3">
                        <label for="description">شماره داخلی </label>
                        <input class="form-control" id="tel2" name="tel2">{{ old('tel2') }}</input>
                    </div>
                    <div class="form-gro‍up col-md-3">
                        <label for="description">شماره همراه </label>
                        <input class="form-control" id="mobile" name="mobile">{{ old('mobile') }}</input>
                    </div>
                    <div class="form-gro‍up col-md-3">
                        <label for="description">شماره نمابر </label>
                        <input class="form-control" id="fax" name="fax">{{ old('fax') }}</input>
                    </div>
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="description">آدرس </label>
                    <input class="form-control" id="address" name="address">{{ old('address') }}</input>
                </div>
                <div class="form-gro‍up col-md-12">
                    <label for="description">صندوق پستی </label>
                    <input class="form-control" id="email" name="email">{{ old('email') }}</input>
                </div>

            </div>

            <button class="btn btn-outline-primary mt-3 mr-3" type="submit">ثبت</button>
            <a href="{{ route('admin.departments.index') }}" class="btn btn-dark mt-3">بازگشت</a>
        </form>
    </div>

</div>

@endsection