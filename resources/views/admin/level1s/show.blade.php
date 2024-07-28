@extends('admin.layouts.admin')

@section('title')
نمایش واحد های سطح سوم
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
        @include('admin.sections.errors')
        <form action="{{ route('admin.level1s.update', ['level1' => $level1]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="container text-center">
                    <div class="row">
                        @isset($level1->name)
                        <div class="col-12">
                            <p class="">{{ $level1->name }}</p>
                        </div>
                        @endisset
                    </div>
                    <div class="row">
                        @isset($level1->description)
                        <div class="col-md-12 form-group">
                            <p class="" disabled>{{ $level1->description }}</p>
                        </div>
                        @endisset
                    </div>
                    <div class="row">
                        @isset($level1->modir->avatar)
                        <div class="col-md-2">
                            <div class="card">
                                <img class="card-img-top"
                                    src="{{ url(env('MODIR_IMAGES_UPLOAD_PATH') . $level1->modir->avatar) }}" alt="">
                            </div>
                            @isset(($level1->modir)->name)
                            <div class="row">
                                <label for="manager">معاون</label>
                                <p>{{ optional($level1->modir)->name }}</p>
                            </div>
                            @endisset
                        </div>
                        @endisset
                    </div>

                    <div class="row">
                        <div class="col-2">
                            @isset($level1->email)
                            <div class="row">
                                <label for="email">صندوق پستی </label>
                                <p class="">{{ $level1->email }}</p>
                            </div>
                            @endisset
                        </div>
                        <div class="col-2">
                            @isset($level1->tel1)
                            <div class="form-group col-md-2">
                                <label for="tel1"> تلفن</label>
                                <p>{{ $level1->tel1 }}</p>
                            </div>
                        </div>
                        <div class="col-2">
                            @endisset
                            @isset($level1->tel2)
                            <div class="row">
                                <label for="tel2"> تلفن </label>
                                <p>{{ $level1->tel2 }}</p>
                            </div>
                            @endisset
                        </div>
                        <div class="col-2">
                            @isset($level1->tel3)
                            <div class="form-group col-md-1">
                                <label for="tel3"> داخلی </label>
                                <p>{{ $level1->tel3 }}</p>
                            </div>
                            @endisset
                        </div>
                        <div class="col-2">
                            @isset($level1->mobile)
                            <div class="form-group col-md-3">
                                <label for="body">شماره موبایل </label>
                                <p>{{ $level1->mobile }}</p>
                            </div>
                            @endisset
                        </div>
                        <div class="col-2">
                            @isset($level1->fax)
                            <div class="form-group col-md-4">
                                <label for="body">نمایر </label>
                                <p>{{ $level1->fax }}</p>
                            </div>
                            @endisset
                        </div>
                       
                    </div>

                </div>
                <div class="row">
                    @isset($level1->address)
                    <div class="form-group col-md-12">
                        <label for="body">آدرس </label>
                        <p>{{ $level1->address }}</p>
                    </div>
                    @endisset
                    <div class="col-2">
                        @isset($level1->fax)
                        <div class="form-group col-md-4">
                            <label for="body">اولویت </label>
                            <p>{{ $level1->prioroty }}</p>
                        </div>
                        @endisset
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="row">
                    @foreach ($images as $image)
                    <div class="text-center col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ url(env('LEVEL1_IMAGES_UPLOAD_PATH') . $image->image) }}"
                                alt="">
                        </div>
                    </div>
                    @endforeach
                </div>
                 <div class="row">
                    @foreach ($personnelImages as $personnelImage)
                    <div class="text-center col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ url(env('PERSONNEL_IMAGES_UPLOAD_PATH') . $personnelImage->avatar) }}"
                                alt="">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <a href="{{ route('admin.level1s.index') }}" class="mt-5 mr-3 btn btn-dark">بازگشت</a>
        </form>

    </div>

</div>
@endsection