@extends('admin.layouts.admin')
@section('title')
ویرایش و اضاقه کردن فایل
@endsection
@section('script')
<script>
    $('#docs').change(function() {
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
    <div class="p-5 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">ویرایش اسناد مزایده : {{ $auction->title }}</h5>
        </div>
        @include('admin.sections.errors')
        <hr>
        <form action="{{ route('admin.auctions.files.add', ['auction' => $auction->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-4">
                    <div class="custom-file">
                        <input type="file" name="docs[]" multiple class="custom-file-input" id="docs">
                        <label class="custom-file-label" for="docs"> اضافه کردن اسناد </label>
                    </div>
                </div>
            </div>
            <button class="mt-4 btn btn-outline-primary" type="submit">افزودن سند</button>
            <a href="{{ route('admin.auctions.index') }}" class="mt-4 mr-3 btn btn-dark">بازگشت</a>
        </form>
        <div class="row">
            @foreach ($auction->files as $file)
            <div class="mt-5 text-center col-md-3">
                <div class="mb-3 card">
                    <a href="{{ url(env('AUCTION_FILES_UPLOAD_PATH') . $file->file) }}">{{ $file->file }}</a>
                    <div class="card-body">
                        <form action="{{ route('admin.auctions.files.destroy', ['auction' => $auction->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <input class="text-center" type="hidden" name="auction_id" value="{{ $file->id }}">
                            <button class="mb-3 btn btn-danger btn-sm" type="submit">حذف</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection