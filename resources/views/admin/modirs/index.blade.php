@extends('admin.layouts.admin')
@section('title')
لبست مدیران
@endsection
@section('content')
<!-- Content Row -->
<div class="row ">
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12 mh-100">
        <div class="mb-4 text-center d-flex flex-column flex-md-row justify-content-md-between">
            <h5 class="mb-3 font-weight-bold mb-md-0">لیست مدیران </h5>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.modirs.create') }}">
                <i class="fa fa-plus"></i>
                    مدیر جدید
            </a>
        </div>
        <div class="table-responsive">
            <table class="table text-center table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>تصویر</th>
                        <th>نام </th>
                        <th>واحد</th>
                        <th>عنوان شغلی </th>
                        <th> تحصیلات </th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($modirs as $key => $modir)
                    <tr class="align-middle">
                        <th class="align-middle font-titr">
                            <a href="{{ route('admin.modirs.show', ['modir' => $modir->id]) }}">
                                {{ $modirs->firstItem() + $key }}
                            </a>
                        </th>
                        <th>
                            <div>
                                <img class="rounded-circle" style="width: 50px;height: 50px"
                                    src="{{ url(env('MODIR_IMAGES_UPLOAD_PATH') . $modir->avatar) }}"
                                    alt="{{ $modir->name }}">
                            </div>
                        </th>
                        <th class="align-middle">
                            <a href="{{ route('admin.modirs.show', ['modir' => $modir->id]) }}">
                                {{ $modir->name }}
                            </a>
                        <th class="align-middle">
                            @isset($modir->level1->name)
                            <a href="{{ route('admin.modirs.show', ['modir' => $modir->id]) }}">
                                {{ $modir->level1->name }}
                            </a>
                            @endisset
                            
                            @isset($modir->level2->name)
                            <a href="{{ route('admin.modirs.show', ['modir' => $modir->id]) }}">
                                {{ $modir->level2->name }}
                            </a>
                            @endisset
                            @isset($modir->level3->name)
                            <a href="{{ route('admin.modirs.show', ['modir' => $modir->id]) }}">
                                {{ $modir->level3->name }}
                            </a>
                            @endisset
                        </th>
                        <th class="align-middle">
                            @isset($modir->title)
                            <a href="{{ route('admin.modirs.show', ['modir' => $modir->id]) }}">
                                {{ $modir->title }}
                            </a>
                            @endisset
                        </th>
                        <th class="align-middle">
                            <a href="{{ route('admin.modirs.show', ['modir' => $modir->id]) }}">
                                {{ $modir->ad }}
                            </a>
                        </th>
                        <th class="align-middle">
                            <span class="{{ $modir->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                {{ $modir->is_active }}
                            </span>
                        </th>
                        <th class="align-middle">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    عملیات
                                </button>
                                <div class="dropdown-menu">

                                    <a href="{{ route('admin.modirs.edit', ['modir' => $modir->id]) }}"
                                        class="text-right dropdown-item">
                                        ویرایش
                                    </a>

                                    <a href="{{ route('admin.modirs.show', ['modir' => $modir->id]) }}"
                                        class="text-right dropdown-item">
                                        نمایش
                                    </a>
                                    <form action="{{ route('admin.modirs.destroy', ['modir' => $modir->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-right btn btn-sm btn-outline-danger dropdown-item"
                                            type="submit"> <span class="p-1 text-white badge bg-danger text-wrap">حذف
                                                مدیر</span></button>
                                    </form>
                                </div>
                            </div>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-5 d-flex justify-content-center font-titr">
            {{ $modirs->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
<div class="text-center"><p class="font-thin font-vazir">برای دیده شدن مدیر عامل در صحفه اصلی عنوان مدیر عامل باید  به'مدیر عامل سازمان' مقدار دهی شود.</p></div>
@endsection