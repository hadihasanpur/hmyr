@extends('admin.layouts.admin')
@section('title')
ویرایش واحد  سوم
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
            <h5 class="font-weight-bold">ویرایش واحد سطح سوم</h5>
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
                        <div class="mx-auto form-group col-8">
                            <label for="name">عنوان واحد</label>
                            <input class="form-control" id="title" name="name" type="text"
                                value="{{ $level3->name }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="description">توضیحات یا خلاصه ای از شرح وظایف واحد</label>
                            <textarea class="form-control" id="description" name="description">{{ $level3->description }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="email">صندوق پستی  </label>
                            <input class="form-control" id="email" name="email" value="{{ $level3->email }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mx-auto form-group col-md-3">
                            <label for="Mylevel2">زیرمجموعه سطح دوم</label>
                            <select class="form-control" id="Mylevel2" name="Mylevel2">
                                @foreach ($Mylevel2s as $Mylevel2)
                                <option value="{{ $Mylevel2->name }}" selected> {{ $Mylevel2->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group col">
                            <label for="botel1dy">شماره تلفن</label>
                            <input class="form-control" id="tel1" name="tel1" value="{{ $level3->tel1 }}">
                        </div>
                        <div class="form-group col">
                            <label for="fax">نمابر  </label>
                            <input class="form-control" id="fax" name="fax" value="{{ $level3->fax }}">
                        </div>  
                        <div class="mx-auto form-group col-2">
                        <label for="priority">ترتیب منو</label>
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
                        <div class="form-group col">
                            <label for="body">آدرس </label>
                            <input class="form-control" id="address" name="address" value="{{ $level3->address }}">
                        </div>
                    </div>
                    <button class="mt-5 btn btn-outline-primary" type="submit">ثبت</button>
                    <a href="{{ route('admin.level3s.index') }}" class="mt-5 mr-3 btn btn-dark">بازگشت</a>
                </div>
        </form>
    </div>
    </div>
</div>
@endsection