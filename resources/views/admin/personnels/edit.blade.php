@extends('admin.layouts.admin')
@section('title')
ویرایش پزسنل
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
            <h5 class="font-weight-bold">ویرایش مدیر</h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        <form action="{{ route('admin.personnels.update', ['personnel' => $personnel]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="text-center container-xl">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="name">نام </label>
                            <input class="text-center form-control" id="name" name="name" type="text"
                                value="{{ $personnel->name }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="avatar"> انتخاب تصویر اصلی </label>
                            <div class="custom-file">
                                <input type="file" name="avatar" class="custom-file-input" id="avatar">
                                <label class="text-right custom-file-label" for="avatar"> انتخاب  </label>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="post">عنوان شغلی </label>
                            <input class="text-center form-control" id="post" name="post" type="text"
                                value="{{ $personnel->post }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="ad">مدرک تحصیلی </label>
                            <input class="text-center form-control" id="ad" name="ad" type="text" value="{{ $personnel->ad }}">
                        </div>
                    </div>
                    <div>
                            <label for="Mylevel1">واحد مربوطه</label>
                            <select class="form-control" id="Mylevel1" name="Mylevel1">
                                <option value="@isset($modir->level1->name)
                                                            {{ $modir->level1->name }}
                                                            @endisset
                                                            @isset($modir->level2->name)
                                                            {{ $modir->level2->name }}level2
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
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="description"> شرح وظایف</label>
                            <textarea class="form-control" id="description"
                                name="description">{{ $personnel->description }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-4 col-md-6">
                            <label> تاریخ شروع ماموریت </label>
                            <div class="input-group">
                                <div class="order-2 input-group-prepend">
                                    <span class="input-group-text" id="DateFrom1">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                </div>
                                <input type="text" class="text-center form-control font-titr" id="InputDateFrom1" name="started_at"
                                    value="{{ $personnel->started_at == null ? null : verta($personnel->started_at) }}">
                            </div>
                        </div>
                        <div class="mt-4 col-md-6">
                            <label> تاریخ پایان ماموریت </label>
                            <div class="input-group">
                                <div class="order-2 input-group-prepend">
                                    <span class="input-group-text" id="DateFrom2">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                </div>
                                <input type="text" class="text-center form-control font-titr" id="InputDateFrom2" name="finished_at"
                                    value="{{ $personnel->finished_at == null ? null : verta($personnel->finished_at) }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="is_active">وضعیت</label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="1" selected>فعال</option>
                                <option value="0">غیرفعال</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="priority">ترتیب قرار گیری در منو</label>
                            <select class="text-center form-control" id="priority" name="priority">
                                <option value="1" selected> 1 </option>
                                <option value="2" selected> 2 </option>
                                <option value="3" selected> 3 </option>
                                <option value="4" selected> 4 </option>
                                <option value="5" selected> 5 </option>
                                <option value="6" selected> 6 </option>
                            </select>
                        </div>
                    </div>
                    <button class="mt-5 btn btn-outline-primary" type="submit">ثبت</button>
                    <a href="{{ route('admin.personnels.index') }}" class="mt-5 mr-3 btn btn-dark">بازگشت</a>
                </div>
                </form>
    </div>
</div>
@endsection