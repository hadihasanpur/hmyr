@extends('admin.layouts.admin')
@section('title')
ویرایش واحد سطح اول
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
            <h5 class="font-weight-bold">ویرایش واحد سطح اول</h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        <form action="{{ route('admin.level1s.update', ['level1' => $level1]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="container text-center">
                    <div class="row">
                        <div class="mx-auto form-group col-8">
                            <label for="name">عنوان واحد</label>
                            <input class="form-control" id="name" name="name" type="text"
                                value="{{ $level1->name }}">
                        </div>
                        <div class="mx-auto form-group col-2">
                            <label for="priority">ترتیب قرار گیری در منو</label>
                            <select class="form-control" id="priority" name="priority">
                                <option value="1" selected> 1 </option>
                                <option value="2" selected> 2 </option>
                                <option value="3" selected> 3 </option>
                                <option value="4" selected> 4 </option>
                                <option value="5" selected> 5 </option>
                                <option value="6" selected> 6 </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-floating col">
                            <label for="description">توضیحات یا خلاصه ای از شرح وظایف واحد</label>
                            <textarea class="form-control" id="description" name="description" rows="8">{{ $level1->description }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="email">صندوق پستی  </label>
                            <input class="form-control" id="email" name="email" value="{{ $level1->email }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-2">
                            <label for="tel1">شماره تلفن</label>
                            <input class="form-control" id="tel1" name="tel1" value="{{ $level1->tel1 }}">
                        </div>
                        <div class="form-group col-2">
                            <label for="tel2">شماره تلفن  </label>
                            <input class="form-control" id="tel2" name="tel2" value="{{ $level1->tel2 }}">
                        </div> 
                        <div class="form-group col-2">
                            <label for="tel3">شماره تلفن داخلی </label>
                            <input class="form-control" id="tel3" name="tel3" value="{{ $level1->tel3 }}">
                        </div>
                       <div class="form-group col-md-4">
                            <label for="botel1dy">صندوق پستی </label>
                            <input class="form-control" id="email" name="email" value="{{ $level1->email }}">
                        </div> 
                        <div class="form-group col-2">
                            <label for="fax">نمایر  </label>
                            <input class="form-control" id="fax" name="fax" value="{{ $level1->fax }}">
                        </div>
                        
                       
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="address">آدرس </label>
                            <input class="form-control" id="address" name="address" value="{{ $level1->address }}">
                        </div>
                    </div>
                    <button class="mt-5 btn btn-outline-primary" type="submit">ثبت</button>
                    <a href="{{ route('admin.level1s.index') }}" class="mt-5 mr-3 btn btn-dark">بازگشت</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection