@extends('admin.layouts.admin')

@section('title')
نمایش کارشناسان
@endsection

@section('content')

<!-- Content Row -->
<div class="row">

    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">مدیران : {{ $personnel->name }}</h5>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-1">
                <div class="card">
                    <img class="card-img-top" src="{{ url(env('PERSONNEL_IMAGES_UPLOAD_PATH') . $personnel->avatar) }}"
                        alt="{{ $personnel->name }}">
                </div>
            </div>
            
            <div class="form-group col-md-2">
                <label>نام </label>
                <input class="form-control" type="text" value="{{ $personnel->name }}" disabled>
            </div>
            
            <div class="form-group col-md-2">
                <label>عنوان شغلی </label>
                <input class="form-control" type="text" value="{{ $personnel->post }}" disabled>
            </div>
            <div class="form-group col-md-3">
                @isset($personnel->level1->name)
                <a href="{{ route('admin.personnels.show', ['personnel' => $personnel->id]) }}">
                    {{ $personnel->level1->name }}
                </a>
                @endisset
                @isset($personnel->level2->name)
                <a href="{{ route('admin.personnels.show', ['personnel' => $personnel->id]) }}">
                    {{ $personnel->level2->name }}
                </a>
                @endisset
                @isset($personnel->level3->name)
                <a href="{{ route('admin.personnels.show', ['personnel' => $personnel->id]) }}">
                    {{ $personnel->level3->name }}
                </a>
                @endisset
            </div>

            <div class="form-group col-md-3">
                <label>مدرک تحصیلی </label>
                <input class="form-control" type="text" value="{{ $personnel->ad }}" disabled>
            </div>
            
            <div class="form-group col-md-1">
                <label for="is_active">وضعیت</label>
                <select class="form-control" disabled id="is_active" name="is_active">
                    <option value="1" selected>فعال</option>
                    <option value="0">غیرفعال</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
                <label>تاریخ شروع همکاری</label>
                <input class="text-center form-control" type="text" value="{{ verta($personnel->started_at) }}" disabled>
            </div>
            <div class="form-group col-md-2">
                <label>تاریخ اتمام همکازی</label>
                <input class="text-center form-control" type="text" value="{{ verta($personnel->finished_at) }}" disabled>
            </div>
            <div class="form-group col-md-8">
                <label>رزومه </label>
                <input class="form-control" type="text" value="{{ $personnel->description }}" disabled>
            </div>
        </div>
        

        <a href="{{ route('admin.personnels.index') }}" class="mt-5 btn btn-dark">بازگشت</a>
    </div>

</div>

@endsection