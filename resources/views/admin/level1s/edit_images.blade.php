@extends('admin.layouts.admin')

@section('title')
ویرایش تصاویر واحد
@endsection

@section('script')
<script>
    // Show File Name
        $('#avatar').change(function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });‍
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
    <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
        <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">ویرایش تصاویر واحد : {{ $level1->title }}</h5>
        </div>
        @include('admin.sections.errors')
        <hr>
        <div class="row">
            <h5 class="text-center mx-auto">تصاویر واحد : </h5>
        </div>
            {{-- Show other Images --}}
        <hr>
        <div class="row">
            @foreach ($level1->images as $image)
            <div class="col-md-3 text-center">
                <div class=" mx-auto">
                    <div class="mx-auto text-center">
                        <img class="img-thumbnail mx-auto" style="height: 200px;width:200px"
                            alt="{{ $level1->title }}"
                            src="{{ url(env('LEVEL1_IMAGES_UPLOAD_PATH') . $image->image) }}">
                    </div>
                    <div class="mx-auto">
                        <form
                            action="{{ route('admin.level1s.images.destroy', ['level1' => $level1->id]) }}"
                            method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="level1_id" value="{{ $image->id }}">
                            <button class="btn btn-danger btn-sm mb-3 mx-auto ml-2" type="submit">حذف</button>
                        </form>
                    </div>
                    <div class="">
                        <form
                            action="{{ route('admin.level1s.images.underImage', ['level1' => $level1->id]) }}"
                            method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="level1_id" value="{{ $image->id }}">
                            <input class="form-control" id="underImage" name="underImage" type="text"
                                value="{{ $image->underImage }}">
                            <button class="btn btn-success btn-sm mb-3 mx-auto" type="submit">اضافه کردن متن به
                                تصویر</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class=" row mx-auto col-md-4">
            <form action="{{ route('admin.level1s.images.add', ['level1' => $level1->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="images[]" multiple class="custom-file-input" id="images">
                        <label class="custom-file-label" for="images"> اضافه کردن تصاویر به واحد </label>
                    </div>
                </div>
                 <script type="text/javascript">

    $('.custom-file input').change(function (e) {
        var files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            files.push($(this)[0].files[i].name);
        }
        $(this).next('.custom-file-label').html(files.join(', '));
    });

</script>
                
<div class="container-fluid text-left mt-3">
            <button class="btn btn-outline-primary mt-2 text-center" type="submit">اضافه کن</button>
            <a href="{{ route('admin.level1s.index') }}" class="btn btn-dark mt-2 mr-3">بازگشت</a>
            

        </div>
            </form>
        </div>
        <hr>
        
    </div>
</div>
@endsection