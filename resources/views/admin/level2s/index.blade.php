@extends('admin.layouts.admin')
@section('title')
لبست واحدهای سطح دوم
@endsection
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center d-flex flex-column flex-md-row justify-content-md-between">
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.level2s.create') }}">
                <i class="fa fa-plus"></i>
                ایجاد واحد سطح دوم جدید
            </a>
        </div>
        <div class="table-responsive">
            <table class="table text-center table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان واحد</th>
                        <th>مدیر</th>
                        <th>ایمیل</th>
                        <th>واحد تحت امر</th>
                        <th>ترتیب منو</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($level2s as $key => $level2)
                    <tr>
                        <th class="font-titr">
                            <a href="{{ route('admin.level2s.show', ['level2' => $level2->id]) }}">
                                {{ $level2s->firstItem() + $key }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.level2s.show', ['level2' => $level2->id]) }}">
                                {{ $level2->name }}
                            </a>
                        </th>
                        <th>
                            {{--optionaایمیلl() The optional function accepts any argument and allows you to access properties
                            or call methods on that object. If the given object is null, properties and methods
                            will return null instead of causing an error:
                            https://stackoverflow.com/questions/32469542/trying-to-get-property-of-non-object-laravel-5 --}}
                            <a href="{{ route('admin.level2s.show', ['level2' => $level2->id]) }}">
                                {{ optional($level2->modir)->name }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.level2s.show', ['level2' => $level2->id]) }}">
                                {{ $level2->email }}
                            </a>
                        </th>  
                        <th>
                            @isset($level2->level1->name)
                            <a href="{{ route('admin.level2s.show', ['level2' => $level2->id]) }}">
                                {{ optional($level2->level1)->name }}
                            </a>
                            @endisset
                        </th>
                        <th class="font-titr">
                            <a href="{{ route('admin.level2s.show', ['level2' => $level2->id]) }}">
                                {{ $level2->priority }}
                            </a>
                        </th>
                        <th>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    عملیات
                                </button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('admin.level2s.edit', ['level2' => $level2->id]) }}"
                                        class="text-right dropdown-item">
                                        ویرایش
                                    </a>
                                    <a href="{{ route('admin.level2s.images.edit', ['level2' => $level2->id]) }}"
                                        class="text-right dropdown-item"> ویرایش تصاویر
                                    </a>
                                    <a href="{{ route('admin.level2s.show', ['level2' => $level2->id]) }}"
                                        class="text-right dropdown-item">
                                        نمایش
                                    </a>
                                    <form
                                        action="{{ route('admin.level2s.destroy', ['level2' => $level2->id]) }}"
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
            {{ $level2s->render() }}
        </div>
    </div>
</div>
@endsection