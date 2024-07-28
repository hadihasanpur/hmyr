@extends('admin.layouts.admin')
@section('title')
زیر واحد لایه ۳ جدید
@endsection
@section('script')
<script>
    $('#avatar').change(function() {
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
        <form action="{{ route('admin.level3s.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="form-row">
                    <label for="name">عنوان واحد</label>
                    <input class="form-control" id="name" name="name"{{ old('name') }}>
                </div>
                <div class="form-row">
                    <div class="mx-auto form-group col-md-8">
                        <label for="Mylevel2">  واحدهای سطح دوم</label>
                        <select class="form-control" id="Mylevel2" name="Mylevel2">
                            @foreach ($Mylevel2s as $Mylevel2)
                            <option value="{{ $Mylevel2->name }}" selected> {{ $Mylevel2->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mx-auto form-group col-md-8">
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
                <div class="form-gro‍up col-md-12">
                    <label for="description">شرح وظایف</label>
                    <textarea class="form-control" rows="5" id="description"
                        name="description">{{ old('description') }}</textarea>
                </div>
                <div class="row">
                </div>
                <div class="row">
                    <div class="form-gro‍up col-md-3">
                        <label for="tel1">شماره تلفن </label>
                        <input class="form-control" id="tel1" name="tel1"{{ old('tel1') }}>
                    </div>
                    <div class="form-gro‍up col-md-3">
                        <label for="fax">شماره نمابر </label>
                        <input class="form-control" id="fax" name="fax"{{ old('fax') }}>
                    </div>
                </div>
                <div class="row">
                    <div class="form-gro‍up col-md-12">
                        <label for="address">آدرس </label>
                        <input class="form-control" id="address" name="address"{{ old('address') }}>
                    </div>
                    <div class="form-gro‍up col-md-12">
                        <label for="email">صندوق پستی </label>
                        <input class="form-control" id="email" name="email"{{ old('email') }}>
                    </div>
                </div>
            </div>
            <button class="mt-3 mr-3 btn btn-outline-primary" type="submit">ثبت</button>
            <a href="{{ route('admin.level3s.index') }}" class="mt-3 btn btn-dark">بازگشت</a>
        </form>
    </div>
</div>
@endsection