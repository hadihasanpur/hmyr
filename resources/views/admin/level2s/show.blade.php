@extends('admin.layouts.admin')

@section('title')
واحد جدید
@endsection
@section('script')
<script>
    $('#images').change(function() {
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
        });
</script>
@endsection
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">نمایش واحد</h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        <form action="{{ route('admin.level2s.update', ['level2' => $level2]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="container text-center">
                    <div class="row">
                        <div class="mx-auto form-group col-12">
                            <label for="name">عنوان واحد</label>
                            <input class="form-control text-center name="name" type="text"
                                value="{{ $level2->name }}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="card">
                                <img class="card-img-top" src="{{ url(env('LEVEL2_IMAGES_UPLOAD_PATH') . $level2->avatar) }}"
                                    alt="{{ $level2->name }}">
                            </div>
                        </div>
                        <div class="form-group col-md-10">
                            <textarea class="form-control" id="description" rows="6"
                                name="description" disabled>{{ $level2->description }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-2">
                            <label for="manager"> مدیر واحد</label>
                            <input class="form-control" id="manager" name="manager" value="{{ $level2->manager }}" disabled>
                        </div>
                        <div class="form-group col-2">
                            <label for="ad">مدرک تحصیلی</label>
                            <input class="form-control" id="ad" name="ad" value="{{ $level2->ad }}" disabled>
                        </div>
                        <div class="form-group col-2">
                            <label for="post">پست سازمانی </label>
                            <input class="form-control" id="post" name="post" value="{{ $level2->post }}" disabled>
                        </div>
                        <div class="form-group col-2">
                            <label for="email">صندوق پستی </label>
                            <input class="form-control" id="email" name="email" value="{{ $level2->email }}" disabled>
                        </div>
                        <div class="form-group col">
                            <label for="tel1"> مستقیم</label>
                            <input class="form-control" id="tel1" name="tel1" value="{{ $level2->tel1 }}" disabled>
                        </div>
                        <div class="form-group col">
                            <label for="tel2"> داخلی</label>
                            <input class="form-control" id="tel2" name="tel2" value="{{ $level2->tel2 }}" disabled>
                        </div>
                        <div class="form-group col-2">
                            <label for="mobile"> موبایل </label>
                            <input class="form-control" id="mobile" name="mobile" value="{{ $level2->mobile }}" disabled>
                        </div>
                        <div class="form-group col-2">
                            <label for="fax">نمابر </label>
                            <input class="form-control" id="fax" name="fax" value="{{ $level2->fax }}" disabled>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="address">آدرس </label>
                            <input class="form-control" id="address" name="address" value="{{ $level2->address }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="row">
                        @foreach ($images as $image)
                        <div class="text-center col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ url(env('LEVEL2_IMAGES_UPLOAD_PATH') . $image->image) }}"
                                    alt="{{ $level2->name }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="mt-5 btn btn-outline-primary" type="submit">ثبت</button>
                    <a href="{{ route('admin.level2s.index') }}" class="mt-5 mr-3 btn btn-dark">بازگشت</a>
                </div>
                
        </form>
    </div>
</div>
@endsection