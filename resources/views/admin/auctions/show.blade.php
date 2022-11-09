@extends('admin.layouts.admin')

@section('title')
show auctions
@endsection

@section('content')

<!-- Content Row -->
<div class="row">

    <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
        <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">مزایده : {{ $auction->name }}</h5>
        </div>
        <hr>

        <div class="row">
            <div class="form-group col-md-3">
                <label>عنوان مزایده</label>
                <input class="form-control" type="text" value="{{ $auction->title }}" disabled>
            </div>
            <div class="form-group col-md-3">
                <label>متن مزایده</label>
                <input class="form-control" type="text" value="{{ $auction->body }}" disabled>
            </div>
            <div class="form-group col-md-2">
                <label for="is_active">وضعیت</label>
                <select class="form-control" disabled id="is_active" name="is_active">
                    <option value="1" selected>فعال</option>
                    <option value="0">غیرفعال</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>تاریخ ایجاد</label>
                <input class="form-control" type="text" value="{{ verta($auction->created_at) }}" disabled>
            </div>
            <div class="form-group col-md-3">
                <label>تاریخ شروع مزایده</label>
                <input class="form-control" type="text" value="{{ verta($auction->started_at) }}" disabled>
            </div>
            <div class="form-group col-md-3">
                <label>تاریخ اتمام مزایده</label>
                <input class="form-control" type="text" value="{{ verta($auction->finished) }}" disabled>
            </div>
            

        </div>
        <div class="col-md-12">
            <hr>
            @foreach ($files as $file)
            <div class="col-md-8">
                <div class="row">
                    <a href="{{ url(env('AUCTION_FILES_UPLOAD_PATH') . $file->file) }}">{{ $file->file }}</a>
                </div>
            </div>
            @endforeach
        </div>

       

        <a href="{{ route('admin.auctions.index') }}" class="btn btn-dark mt-5">بازگشت</a>
    </div>

</div>

@endsection