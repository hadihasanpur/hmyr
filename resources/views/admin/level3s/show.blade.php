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
        <form action="{{ route('admin.level3s.update', ['level3' => $level3]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="container text-center">
                    <div class="row">
                        <div class="mx-auto form-group col-12">
                            <label for="name">عنوان واحد</label>
                            <input class="form-control text-center name="name" type="text"
                                value="{{ $level3->name }}" disabled>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="card">
                                <img class="card-img-top" src="{{ url(env('LEVEL3_IMAGES_UPLOAD_PATH') . $level3->avatar) }}"
                                    alt="{{ $level3->name }}">
                            </div>
                        </div>
                        <div class="form-group col-md-10">
                            <textarea class="form-control" id="description" rows="6"
                                name="description" disabled>{{ $level3->description }}</textarea>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="form-group col-2">
                            <label for="manager"> مدیر واحد</label>
                            <input class="form-control" id="manager" name="manager" value="{{ $level3->manager }}" disabled>
                        </div>
                        <div class="form-group col-2">
                            <label for="ad">مدرک تحصیلی</label>
                            <input class="form-control" id="ad" name="ad" value="{{ $level3->ad }}" disabled>
                        </div>
                        <div class="form-group col-2">
                            <label for="post">پست سازمانی </label>
                            <input class="form-control" id="post" name="post" value="{{ $level3->post }}" disabled>
                        </div>
                        <div class="form-group col-2">
                            <label for="email">صندوق پستی </label>
                            <input class="form-control" id="email" name="email" value="{{ $level3->email }}" disabled>
                        </div>
                        <div class="form-group col">
                            <label for="tel1"> مستقیم</label>
                            <input class="form-control" id="tel1" name="tel1" value="{{ $level3->tel1 }}" disabled>
                        </div>
                        <div class="form-group col">
                            <label for="tel2"> داخلی</label>
                            <input class="form-control" id="tel2" name="tel2" value="{{ $level3->tel2 }}" disabled>
                        </div>
                        <div class="form-group col-2">
                            <label for="mobile"> موبایل </label>
                            <input class="form-control" id="mobile" name="mobile" value="{{ $level3->mobile }}" disabled>
                        </div>
                        <div class="form-group col-2">
                            <label for="fax">نمابر </label>
                            <input class="form-control" id="fax" name="fax" value="{{ $level3->fax }}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="address">آدرس </label>
                            <input class="form-control" id="address" name="address" value="{{ $level3->address }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="row">
                        
                        @foreach ($images as $image)
                        <div class="text-center col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ url(env('LEVEL3_IMAGES_UPLOAD_PATH') . $image->image) }}"
                                    alt="{{ $level3->name }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="{{ route('admin.level3s.index') }}" class="mt-5 mr-3 btn btn-dark">بازگشت</a>
                </div>
        </form>
    </div>
</div>
@endsection