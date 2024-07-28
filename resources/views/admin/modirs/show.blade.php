@extends('admin.layouts.admin')
@section('title')
نمایش مدیران
@endsection
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center">
            <h5 class="font-weight-bold">{{ $modir->name }}</h5>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="row ">
                    <label>نام : </label>
                    <P class="">{{ $modir->name }}</P>
                </div>
                @isset($modir->title)
                <div class="row ">
                <label>عنوان : </label>
                <p class=""> {{ $modir->title }}</p>
                </div>   
                @endisset
                @isset($modir->ad)
                <div class="row ">
                    <label>مدرک تحصیلی :</label>
                    <p class=""> {{ $modir->ad }}</p>
                </div>    
                @endisset
                @isset($modir->level1->name)
                <div class="row ">
                    <label>واحد :</label>
                    <p class=""> {{ $modir->level1->name }}</p>
                </div>
                @endisset
                @isset($modir->level2->name)
                <div class="row ">
                    <label>واحد :</label>
                    <p class=""> {{ $modir->level2->name }}</p>
                </div>
                @endisset
                @isset($modir->level3->name)
                <div class="row ">
                    <label>واحد :</label>
                    <p class=""> {{ $modir->level3->name }}</p>
                </div>
                @endisset
                <div class="row ">
                    <label for="is_active">وضعیت :</label>
                    {{ $modir->is_active }}
                </div>
                <div class="row ">
                    <label>تاریخ شروع ماموریت :</label>
                    <p class=""> {{ verta($modir->started_at) }}</p>
                </div>
                <div class="row ">
                    <label>تاریخ اتمام ماموریت :</label>
                    <p class="">{{ verta($modir->finished_at)->format('Y.m.d') }}</p>
                </div>
                @isset($modir->mobile)
                    <div class="row ">
                        <label>موبایل :</label>
                        <p class=""> {{ $modir->mobile }}</p>
                    </div>
                @endisset
                @isset($modir->email)
                    <div class="row ">
                        <label>ایمیل :</label>
                        <p class=""> {{ $modir->email }}</p>
                    </div>
                @endisset
                @isset($modir->category)
                    <div class="row ">
                        <label>گروه مدیران :</label>
                        <p class=""> {{ $modir->category }}</p>
                    </div>
                @endisset
            </div>
            @isset($modir->avatar)
            <div class="mx-auto col-md-6">
                <div class="card">
                    <img class="m-auto mt-4 img-thumbnail w-50" src="{{ url(env('MODIR_IMAGES_UPLOAD_PATH') . $modir->avatar) }}"
                        alt="{{ $modir->name }}">
                </div>
            </div>    
            @endisset
            <div class="row ">
             @isset($modir->description)     
                <label>رزومه : </label>
                <p class="">{{ $modir->description }}</p>
            </div>
            @endisset
        </div>
        <a href="{{ route('admin.modirs.index') }}" class="mt-5 btn btn-dark">بازگشت</a>
    </div>
</div>
@endsection`