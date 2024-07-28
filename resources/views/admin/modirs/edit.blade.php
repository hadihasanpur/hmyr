@extends('admin.layouts.admin')
@section('title')
ویرایش مدیر 
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
        <div class="mb-4 text-center">
            <p class="font-weight-bold font-titr display-5">ویرایش پرسنل</p>
        </div>
        <hr>
        @include('admin.sections.errors')
        <form action="{{ route('admin.modirs.update', ['modir' => $modir]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="text-center container-xl">
                    <div class="form-row">
                        <div class="form-group col-md-3 col-xl-3">
                            <label for="name">نام </label>
                            <input class="form-control" id="name" name="name" type="text" value="{{ $modir->name }}">
                        </div>
                        <div class="form-group col-md-3 col-xl-3">
                            <label for="title">عنوان </label>
                            <input class="form-control" id="title" name="title" type="text" value="{{ $modir->title }}">
                        </div> 
                        <div class="mx-auto form-group col-md-3 col-xl-3">
                            <label for="Mylevel1">واحد مربوطه</label>
                            <select class="form-control" id="Mylevel1" name="Mylevel1">
                            <option value="@isset($modir->level1->name)
                                {{ $modir->level1->name }}
                                @endisset
                                @isset($modir->level2->name)
                                {{ $modir->level2->name }}
                                @endisset
                                @isset($modir->level3->name)
                                {{ $modir->level3->name }}
                                @endisset" selected>
                                        @isset($modir->level1->name)
                                        {{ $modir->level1->name }}
                                        @endisset
                                        @isset($modir->level2->name)
                                        {{ $modir->level2->name }}
                                        @endisset
                                        @isset($modir->level3->name)
                                        {{ $modir->level3->name }}
                                        @endisset
                            </option>
                                @foreach ($Mylevel1s as $Mylevel1)
                                <option value="{{ $Mylevel1->name }}"> {{ $Mylevel1->name }} </option>
                                @endforeach
                                @foreach ($Mylevel2s as $Mylevel2)
                                <option value="{{ $Mylevel2->name }}"> {{ $Mylevel2->name }} </option>
                                @endforeach
                                @foreach ($Mylevel3s as $Mylevel3)
                                <option value="{{ $Mylevel3->name }}"> {{ $Mylevel3->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3 col-xl-3">
                            <label for="ad">مدرک تحصیلی </label>
                            <input class="form-control" id="ad" name="ad" type="text"  value="{{ $modir->ad }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-xl-3">
                            <label for="email">ایمیل</label>
                            <input class="form-control" id="email" name="email" type="text" value="{{ $modir->email }}">
                        </div>
                        <div class="form-group col-md-3 col-xl-3">
                            <label for="mobile">شماره تلفن </label>
                            <input class="form-control" id="mobile" name="mobile" type="text" value="{{ $modir->mobile }}">
                        </div>
                        <div class="form-group col-md-5 col-xl-5">
                            <label for="avatar"> انتخاب تصویر اصلی </label>
                            <div class="custom-file">
                                <input type="file" name="avatar" class="custom-file-input" id="avatar">
                                <label class="custom-file-label" for="avatar"> </label>
                            </div>
                        </div>
                        <div class="form-group col-md-1 col-xl-1">
                            <label for="is_active">وضعیت</label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="1" selected>فعال</option>
                                <option value="0">غیرفعال</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="description"> رزومه</label>
                            <textarea class="form-control" id="description"
                                name="description">{{ $modir->description }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label> تاریخ شروع ماموریت </label>
                            <div class="input-group">
                                <div class="order-2 input-group-prepend">
                                    <span class="input-group-text" id="DateFrom1">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control font-titr" id="InputDateFrom1" name="started_at"
                                    value="{{ $modir->started_at == null ? null : verta($modir->started_at) }}">
                            </div>
                        </div>
                        <div class="col">
                            <label> تاریخ پایان ماموریت </label>
                            <div class="input-group">
                                <div class="order-2 input-group-prepend">
                                    <span class="input-group-text" id="DateFrom2">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control font-titr" id="InputDateFrom2" name="finished_at"
                                    value="{{ $modir->finished_at == null ? null : verta($modir->finished_at) }}">
                            </div>
                        </div>
                    </div>
                    <button class="mt-5 btn btn-outline-primary" type="submit">ثبت</button>
                    <a href="{{ route('admin.modirs.index') }}" class="mt-5 mr-3 btn btn-dark">بازگشت</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection