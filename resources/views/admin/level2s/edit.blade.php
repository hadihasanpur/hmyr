@extends('admin.layouts.admin')
@section('title')
ویرایش واحد دوم
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
            <h5 class="font-weight-bold">ویرایش واحد سطح دوم</h5>
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
                        <div class="mx-auto form-group col-8">
                            <label for="name">عنوان واحد</label>
                            <input class="form-control" id="title" name="name" type="text"
                                value="{{ $level2->name }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="description">توضیحات یا خلاصه ای از شرح وظایف واحد</label>
                            <textarea class="form-control" id="description" name="description">{{ $level2->description }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="email">صندوق پستی  </label>
                            <input class="form-control" id="email" name="email" value="{{ $level2->email }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mx-auto form-group col-md-3">
                            <label for="Mylevel1">زیرمجموعه سطح اول</label>
                            <select class="form-control" id="Mylevel1" name="Mylevel1">
                                @foreach ($Mylevel1s as $Mylevel1)
                                <option value="{{ $Mylevel1->name }}" selected> {{ $Mylevel1->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="botel1dy">شماره تلفن</label>
                            <input class="form-control" id="tel1" name="tel1" value="{{ $level2->tel1 }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="botel1dy">صندوق پستی </label>
                            <input class="form-control" id="email" name="email" value="{{ $level2->email }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fax">نمابر  </label>
                            <input class="form-control" id="fax" name="fax" value="{{ $level2->fax }}">
                        </div>  
                        <div class="mx-auto form-group col-md-3">
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
                            <input class="form-control" id="address" name="address" value="{{ $level2->address }}">
                            <button class="mt-5 btn btn-outline-primary" type="submit">ثبت</button>
                            <a href="{{ route('admin.level2s.index') }}" class="mt-5 mr-3 btn btn-dark">بازگشت</a>
                        </div>
                        
                    </div>
           
                </div>
                
        </form>
    </div>
    </div>
</div>
@endsection