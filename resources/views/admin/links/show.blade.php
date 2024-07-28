@extends('admin.layouts.admin')
@section('title')
نمایش مدیران
@endsection
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center">
            <h5 class="font-weight-bold">{{ $link->name }}</h5>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="row ">
                    <label>نام : </label>
                    <P class="">{{ $link->title }}</P>
                </div>
                @isset($link->link)
                <div class="row ">
                <label>آدرس : </label>
                <p class=""> {{ $link->link }}</p>
                </div>   
                @endisset
                <div class="row ">
                    <label for="is_active">وضعیت :</label>
                    {{ $link->is_active }}
                </div>
            </div>
        </div>
        <a href="{{ route('admin.links.index') }}" class="mt-5 btn btn-dark">بازگشت</a>
    </div>
</div>
@endsection`