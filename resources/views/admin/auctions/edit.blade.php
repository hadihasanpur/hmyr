@extends('admin.layouts.admin')
@section('title')
ویرایش مزایده 
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
        $('#DateFrom3').MdPersianDateTimePicker({
        targetTextSelector: '#InputDateFrom3',
        englishNumber: true,
        enableTimePicker: true,
        textFormat: 'yyyy-MM-dd HH:mm:ss',
        });

        let files = @json($files);
        files.forEach(file => {
        $(`#file-${file.id}`).change(function() {
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
        });
        });
</script>
@endsection
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">ویرایش مزایده</h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        <form action="{{ route('admin.auctions.update', ['auction' => $auction]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="container text-center">
                    <div class="row">
                        <div class="form-group col-10">
                            <label for="name">عنوان مزایده</label>
                            <input class="form-control" id="title" name="title" type="text"
                                value="{{ $auction->title }}">
                        </div>
                        <div class="form-group col-2">
                            <label for="is_active">وضعیت</label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="1" selected>فعال</option>
                                <option value="0">غیرفعال</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="body">متن مزایده</label>
                            <textarea class="form-control" id="body" name="body">{{ $auction->body }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label> تاریخ درج مزایده </label>
                            <div class="input-group">
                                <div class="order-2 input-group-prepend">
                                    <span class="input-group-text" id="DateFrom1">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="InputDateFrom1" name="created_at"
                                    value="{{ $auction->created_at == null ? null : verta($auction->created_at) }}">
                            </div>
                        </div>
                        <div class="col">
                            <label> تاریخ شروع مزایده </label>
                            <div class="input-group">
                                <div class="order-2 input-group-prepend">
                                    <span class="input-group-text" id="DateFrom2">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="InputDateFrom2" name="started_at"
                                    value="{{ $auction->started_at == null ? null : verta($auction->started_at) }}">
                            </div>
                        </div>
                        <div class="col">
                            <label> تاریخ پایان مزایده </label>
                            <div class="input-group">
                                <div class="order-2 input-group-prepend">
                                    <span class="input-group-text" id="DateFrom3">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="InputDateFrom3" name="finished_at"
                                    value="{{ $auction->finished_at == null ? null : verta($auction->finished_at) }}">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <button class="mt-5 btn btn-outline-primary" type="submit">ثبت</button>
            <a href="{{ route('admin.auctions.index') }}" class="mt-5 mr-3 btn btn-dark">بازگشت</a>
        </form>
    </div>
</div>
@endsection