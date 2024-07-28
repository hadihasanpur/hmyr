@extends('admin.layouts.admin')
@section('title')
لبست واحدهای سطح سوم
@endsection
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center d-flex flex-column flex-md-row justify-content-md-between">
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.level3s.create') }}">
                <i class="fa fa-plus"></i>
                ایجاد واحد سطح سوم جدید
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
                    @foreach ($level3s as $key => $level3)
                    <tr>
                        <th class="font-titr">
                            <a href="{{ route('admin.level3s.show', ['level3' => $level3->id]) }}">
                                {{ $level3s->firstItem() + $key }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.level3s.show', ['level3' => $level3->id]) }}">
                                {{ $level3->name }}
                            </a>
                        </th>
                        <th>
                            {{--optionaایمیلl() The optional function accepts any argument and allows you to access properties
                            or call methods on that object. If the given object is null, properties and methods
                            will return null instead of causing an error:
                            https://stackoverflow.com/questions/32469542/trying-to-get-property-of-non-object-laravel-5 --}}
                            <a href="{{ route('admin.level3s.show', ['level3' => $level3->id]) }}">
                                {{ optional($level3->modir)->name }}
                            </a>
                        </th>
                       
                        <th>
                            <a href="{{ route('admin.level3s.show', ['level3' => $level3->id]) }}">
                                {{ $level3->email }}
                            </a>
                        </th>  
                        <th>
                            @isset($level3->level2->name)
                            <a href="{{ route('admin.level3s.show', ['level3' => $level3->id]) }}">
                                {{ optional($level3->level2)->name }}
                            </a>
                            @endisset
                        </th>
                        <th class="font-titr">
                            <a href="{{ route('admin.level3s.show', ['level3' => $level3->id]) }}">
                                {{ $level3->priority }}
                            </a>
                        </th>
                        <th>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    عملیات
                                </button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('admin.level3s.edit', ['level3' => $level3->id]) }}"
                                        class="text-right dropdown-item">
                                        ویرایش
                                    </a>
                                    <a href="{{ route('admin.level3s.images.edit', ['level3' => $level3->id]) }}"
                                        class="text-right dropdown-item"> ویرایش تصاویر
                                    </a>
                                    <a href="{{ route('admin.level3s.show', ['level3' => $level3->id]) }}"
                                        class="text-right dropdown-item">
                                        نمایش
                                    </a>
                                    <form
                                        action="{{ route('admin.level3s.destroy', ['level3' => $level3->id]) }}"
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
            {{ $level3s->render() }}
        </div>
    </div>
</div>
@endsection