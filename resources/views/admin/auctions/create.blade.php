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

        <form action="{{ route('admin.auctions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">عنوان مزایده</label>
                        <input class="form-control" id="title" name="title" type="text" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="description">متن مزایده</label>
                    <textarea class="form-control" id="body" name="body">{{ old('body') }}</textarea>
                </div>
                <label> تاریخ شروع مزایده </label>
                <div class="input-group">
                    <div class="input-group-prepend order-2">
                        <span class="input-group-text" id="DateFrom1">
                            <i class="fas fa-clock"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="InputDateFrom1" name="started_at"
                        value="{{ verta(old('started_at')) }}">
                </div>

                <label> تاریخ پایان مزایده </label>
                <div class="input-group">
                    <div class="input-group-prepend order-2">
                        <span class="input-group-text" id="DateFrom2">
                            <i class="fas fa-clock"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="InputDateFrom2" name="finished_at"
                        value="{{ verta(old('finished_at')) }}">
                </div>


                {{-- Post Image Section --}}
                <div class="col-md-12">
                    <hr>
                    <p>اسناد مزایده : </p>
                </div>

                <div class="form-group col-md-3">
                    <label for="file"> انتخاب اسناد </label>
                    <div class="custom-file">
                        <input type="file" name="file[]" multiple class="custom-file-input" id="file">
                        <label class="custom-file-label" for="file"> انتخاب اسناد </label>
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
            <a href="{{ route('admin.auctions.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
        </form>
    </div>

</div>

@endsection