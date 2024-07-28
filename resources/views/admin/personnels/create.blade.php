@extends('admin.layouts.admin')

@section('title')
create Auctions
@endsection

@section('script')
<script>
    $('#avatar').change(function() {
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
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">پرسنل جدید</h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        <form action="{{ route('admin.personnels.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="name">نام </label>
                    <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}">
                </div>

                <div class="form-group col-md-2">
                    <label for="avatar"> انتخاب تصویر</label>
                    <div class="custom-file">
                        <input type="file" name="avatar" class="custom-file-input" id="avatar">
                        <label class="text-right custom-file-label" for="avatar"> انتخاب </label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="post">عنوان شغلی </label>
                    <input class="form-control" id="post" name="post" type="text" value="{{ old('post') }}">
                </div>

                <div class="form-group col-md-2">
                    <label for="ad">مدرک تحصیلی </label>
                    <input class="form-control" id="ad" name="ad" type="text" value="{{ old('ad') }}">
                </div>

                <div class="mx-auto form-group col-md-3">
                    <label for="Mylevel1">معاونت/واحد مربوطه</label>
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
            </div>

            <div class="row">
                <div class="form-gro‍up col-md-12">
                    <label for="description">شرح وظایف</label>
                    <textarea class="text-justify form-control" rows="5" id="description"
                        name="description">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="mt-4 row">
                <div class="input-group col-md-6">
                    <label class="mt-1 ml-1"> تاریخ شروع همکاری: </label>
                    <div class="order-2 text-center input-group-prepend">
                        <span class="input-group-text" id="DateFrom1">
                            <i class="fas fa-clock"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="InputDateFrom1" name="started_at"
                        value="{{ verta(old('started_at')) }}">
                </div>
                <div class="input-group col-md-6">
                    <label class="mt-1 ml-1"> تاریخ پایان همکاری: </label>
                    <div class="order-2 text-center input-group-prepend">
                        <span class="input-group-text" id="DateFrom2">
                            <i class="fas fa-clock"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="InputDateFrom2" name="finished_at"
                        value="{{ verta(old('finished_at')) }}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-1">
                    <label for="is_active">وضعیت</label>
                    <select class="text-center form-control" id="is_active" name="is_active">
                        <option value="1" selected>فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="priority">ترتیب قرار گیری در منو</label>
                    <select class="text-center form-control" id="priority " name="priority">
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
        </form>
    </div>
</div>
@endsection