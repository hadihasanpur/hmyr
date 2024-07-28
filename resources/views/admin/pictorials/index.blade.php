@extends('admin.layouts.admin')

@section('title')
لیست کل گزارشات تصویری
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center d-flex flex-column flex-md-row justify-content-md-between">
            <h5 class="mb-3 font-weight-bold mb-md-0">لیست گزارشات تصویری </h5>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.pictorials.create') }}">
                <i class="fa fa-plus"></i>
                ایجاد گزارش تصویری
            </a>
        </div>
        <div class="table-responsive">
            <table class="table text-center table-bordered table-striped">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان گزارش تصویری</th>
                        <th>تاریخ </th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pictorials as $key => $pictorial)
                    <tr>
                        <th class="font-titr">
                            <a href="{{ route('admin.pictorials.show', ['pictorial' => $pictorial->id]) }}">
                                {{ $pictorials->firstItem() + $key }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.pictorials.show', ['pictorial' => $pictorial->id]) }}">
                                {{ $pictorial->title }}
                            </a>
                        </th>
                        <th class="font-titr">
                            {{ verta($pictorial->created_at)->format('Y/m/d') }}
                        </th>
                        <th>
                            <span class="{{ $pictorial->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                {{ $pictorial->is_active }}
                            </span>
                        </th>
                        <th>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    عملیات
                                </button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('admin.pictorials.edit', ['pictorial' => $pictorial->id]) }}"
                                        class="text-right dropdown-item">
                                        ویرایش
                                    </a>                                   
                                    <a href="{{ route('admin.pictorials.images.edit', ['pictorial' => $pictorial->id]) }}"
                                        class="text-right dropdown-item"> ویرایش تصاویر
                                    </a>
                                    <a href="{{ route('admin.pictorials.show', ['pictorial' => $pictorial->id]) }}" 
                                        class="text-right dropdown-item">
                                        نمایش
                                    </a>
                                    <form action="{{ route('admin.pictorials.destroy', ['pictorial' => $pictorial->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-right btn btn-sm btn-outline-danger dropdown-item"
                                            type="submit"><span class="p-1 text-white badge bg-danger text-wrap">حذف  گزارش تصویری</span></button>
                                    </form>
                                </div>
                            </div>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-sm-flex justify-content-center mt-5 font-titr">
            {{ $pictorials->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection