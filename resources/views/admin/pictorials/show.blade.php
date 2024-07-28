@extends('admin.layouts.admin')

@section('title')
نمایش گزارش
@endsection

@section('script')

@endsection

@section('content')
<!-- Content Row -->
<div class="row">
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        @include('admin.sections.errors')
        <div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="d-none" for="name">عنوان خبر</label>
                    <input class="form-control" type="text" value="{{$pictorial->title }}" disabled>
                </div>
            </div>
           
            <div class="col-md-12">
                <hr>
            </div>
            <div class="row">
               <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url(env('PICTORIAL_IMAGES_UPLOAD_PATH') . $pictorial->primary_image) }}"
                            alt="{{ $pictorial->title }}">
                    </div>
                </div>
                @foreach ($images as $image)
                <div class="text-center col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ url(env('PICTORIAL_IMAGES_UPLOAD_PATH') . $image->image) }}"
                            alt="{{ $pictorial->title }}">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="mt-1 text-left container-fluid">
            <a href="{{ route('admin.pictorials.index') }}" class="mt-1 mr-3 btn btn-dark">بازگشت</a>
        </div>
    </div>

</div>

@endsection