@extends('admin.layouts.admin')

@section('title')
ویرایش پروژه
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
    <div class=" container-xxl p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold text-center">ویرایش پروژه ها</h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        <form action="{{ route('admin.projects.update', ['project' => $project]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
                <div class="container text-center">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="project">عنوان پروژه</label>
                            <input class="form-control text-center" id="project" name="project" type="text"
                                value="{{ $project->project }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="employer">کارفرما </label>
                            <input class="form-control text-center" id="employer" name="employer" type="text" 
                            value="{{ $project->employer }}">
                        </div>
                        <div class="form-group col">
                            <label for="consultant">مشاور </label>
                            <input class="form-control text-center" id="consultant" name="consultant" type="text" 
                            value="{{ $project->consultant }}">
                        </div>
                        <div class="form-group col">
                            <label for="consultant">محل </label>
                            <input class="form-control text-center" id="location" name="location" type="text" value="{{ $project->location }}">
                        </div>
                        <div class="form-group col">
                            <label for="consultant">هزینه </label>
                            <input class="form-control text-center" id="cost" name="cost" type="text" value="{{ $project->cost }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label> تاریخ شروع پروژه </label>
                            <div class="input-group">
                                <div class="order-2 input-group-prepend ">
                                    <span class="input-group-text" id="DateFrom1">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="InputDateFrom1" name="Projectstart"
                                    value="{{ $project->Projectstart == null ? null : verta($project->Projectstart) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label> تاریخ شروع پروژه </label>
                            <div class="input-group">
                                <div class="order-2 input-group-prepend">
                                    <span class="input-group-text" id="DateFrom2">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="InputDateFrom2" name="Projectend"
                                    value="{{ $project->Projectend == null ? null : verta($project->Projectend) }}">
                                    
                                    
                            </div>
                        </div>
                    </div>
                    <button class="mt-5 btn btn-outline-primary" type="submit">ثبت</button>
                    <a href="{{ route('admin.projects.index') }}" class="mt-5 mr-3 btn btn-dark">بازگشت</a>
                </div>
        </form>
    </div>
@endsection