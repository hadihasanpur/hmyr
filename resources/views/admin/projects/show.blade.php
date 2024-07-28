@extends('admin.layouts.admin')

@section('title')
نمایش پروژه
@endsection

@section('content')

<!-- Content Row -->
<div class="row">

    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">نام پروژه : {{ $project->name }}</h5>
        </div>
        <hr>

        <div class="row">
            <div class="form-group col-md-3">
                <label>نام پروژه</label>
                <input class="form-control" type="text" value="{{ $project->project }}" disabled>
            </div>
            <div class="form-group col-md-3">
                <label> کارفرما</label>
                <input class="form-control" type="text" value="{{ $project->employer }}" disabled>
            </div>
            <div class="form-group col-md-3">
                <label> مشاور</label>
                <input class="form-control" type="text" value="{{ $project->consultant }}" disabled>
            </div>
            <div class="form-group col-md-3">
                <label> هزینه اجرا</label>
                <input class="form-control" type="text" value="{{ $project->cost }}" disabled>
            </div>
            <div class="form-group col-md-3">
                <label>تاریخ شروع</label>
                <input class="form-control" type="text" value="{{ $project->Projectstart }}" disabled>
            </div>
            <div class="form-group col-md-3">
                <label>تاریخ پایان </label>
                <input class="form-control" type="text" value="{{ $project->Projectend }}" disabled>
            </div>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="mt-5 btn btn-dark">بازگشت</a>
    </div>

</div>

@endsection