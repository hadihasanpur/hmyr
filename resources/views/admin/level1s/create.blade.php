@extends('admin.layouts.admin')

@section('title')
واحد سطح اول
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
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        @include('admin.sections.errors')
        <form action="{{ route('admin.level1s.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="form-row">
                    <div class="mx-auto form-group col-md-8">
                        <label for="name"> واحد سطح اول جدید </label>
                        <input class="form-control" id="name" name="name">{{ old('name') }}</input>
                    </div>
                    <div class="form-gro‍up col-md-12">
                        <label for="description">شرح وظایف</label>
                        <textarea class="form-control" rows="5" id="description"
                            name="description">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-row col-md-12">
                        <div class="form-gro‍up col-md-2  col-xl-2 col-xxl-2">
                            <label for="tel1">شماره تماس </label>
                            <input class="form-control" id="tel1" name="tel1">{{ old('tel1') }}</input>
                        </div>
                        <div class="form-gro‍up col-md-2  col-xl-2 col-xxl-2">
                            <label for="tel2">شماره تماس </label>
                            <input class="form-control" id="tel2" name="tel2">{{ old('tel2') }}</input>
                        </div>
                        <div class="form-gro‍up col-md-2  col-xl-2 col-xxl-2">
                            <label for="tel3">شماره داخلی </label>
                            <input class="form-control" id="tel3" name="tel3">{{ old('tel3') }}</input>
                        </div>
                        <div class="form-gro‍up col-md-2  col-xl-2 col-xxl-2">
                            <label for="fax">شماره نمابر </label>
                            <input class="form-control" id="fax" name="fax">{{ old('fax') }}</input>
                        </div>
                        <div class="form-gro‍up col-md-2 col-xl-2 col-xxl-2">
                            <label for="fax"> ترتیب </label>
                            <select class="form-control" id="priority" name="priority">
                                <option value="1" selected> 1 </option>
                                <option value="2" selected> 2 </option>
                                <option value="3" selected> 3 </option>
                                <option value="4" selected> 4 </option>
                                <option value="5" selected> 5 </option>
                                <option value="6" selected> 6 </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-gro‍up col-md-12">
                        <label for="address">آدرس </label>
                        <input class="form-control" id="address" name="address">{{ old('address') }}</input>
                    </div>
                    <div class="form-gro‍up col-md-12">
                        <label for="email">صندوق پستی </label>
                        <input class="form-control" id="email" name="email">{{ old('email') }}</input>
                    </div>
                </div>
                <button class="mt-3 mr-3 btn btn-outline-primary" type="submit">ثبت</button>
                <a href="{{ route('admin.level1s.index') }}" class="mt-3 btn btn-dark">بازگشت</a>
        </form>
    </div>
</div>
@endsection