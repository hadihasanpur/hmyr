@extends('admin.layouts.admin')
@section('title')
لبست واحدهای سطح اول
@endsection
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center d-flex flex-column flex-md-row justify-content-md-between">
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.level1s.create') }}">
                <i class="fa fa-plus"></i>
                ایجاد واحد سطح اول جدید
            </a>
        </div>
        <div class="table-responsive">
            <table class="table text-center table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان واحد</th>
                        <th> مدیر مربوطه</th>
                        <th> ایمیل واحد</th>
                        <th> شماره تماس</th>
                        <th>ترتیب منو</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($level1s as $key => $level1)
                    <tr>
                        <th class="font-titr">
                            <a href="{{ route('admin.level1s.show', ['level1' => $level1->id]) }}">
                                {{ $level1s->firstItem() + $key }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.level1s.show', ['level1' => $level1->id]) }}">
                                {{ $level1->name }}
                            </a>
                        </th>
                        <th>
                        {{--optional() The optional function accepts any argument and allows you to access properties
                        or call methods on that object. If the given object is null, properties and methods
                        will return null instead of causing an error:https://stackoverflow.com/questions/32469542/trying-to-get-property-of-non-object-laravel-5 --}}
                        
                            <a href="{{ route('admin.level1s.show', ['level1' => $level1->id]) }}">
                                {{ optional($level1->modir)->name }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.level1s.show', ['level1' => $level1->id]) }}">
                                {{ $level1->email }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.level1s.show', ['level1' => $level1->id]) }}">
                                {{ $level1->tel1 }}
                            </a>
                        </th>
                        <th class="font-titr">
                            <a href="{{ route('admin.level1s.show', ['level1' => $level1->id]) }}">
                                {{ $level1->priority }}
                            </a>
                        </th>
                        <th>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    عملیات
                                </button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('admin.level1s.edit', ['level1' => $level1->id]) }}"
                                        class="text-right dropdown-item">
                                        ویرایش
                                    </a>
                                    <a href="{{ route('admin.level1s.images.edit', ['level1' => $level1->id]) }}"
                                        class="text-right dropdown-item"> ویرایش تصاویر
                                    </a>
                                    <a href="{{ route('admin.level1s.show', ['level1' => $level1->id]) }}"
                                        class="text-right dropdown-item">
                                        نمایش
                                    </a>
                                    <form
                                        action="{{ route('admin.level1s.destroy', ['level1' => $level1->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-right btn btn-sm btn-outline-danger dropdown-item"
                                            type="submit"> <span class="p-1 text-white badge bg-danger text-wrap">حذف کل
                                                واحد</span></button>
                                    </form>
                                </div>
                            </div>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            {{ $level1s->render() }}
        </div>
    </div>
</div>
@endsection