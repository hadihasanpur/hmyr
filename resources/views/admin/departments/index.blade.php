@extends('admin.layouts.admin')
@section('title')
لبست واحدها
@endsection
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
        <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
            <h5 class="font-weight-bold mb-3 mb-md-0">لیست واحد ها </h5>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.departments.create') }}">
                <i class="fa fa-plus"></i>
                ایجاد واحد جدید
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان واحد</th>
                        <th> مدیر مربوطه</th>
                        <th> عنوان شغلی</th>
                        <th> شماره تماس</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $key => $department)
                    <tr>
                        <th>
                            <a href="{{ route('admin.departments.show', ['department' => $department->id]) }}">
                                {{ $departments->firstItem() + $key }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.departments.show', ['department' => $department->id]) }}">
                                {{ $department->title }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.departments.show', ['department' => $department->id]) }}">
                                {{ $department->manager }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.departments.show', ['department' => $department->id]) }}">
                                {{ $department->post }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.departments.show', ['department' => $department->id]) }}">
                                {{ $department->tel1 }}
                            </a>
                        </th>
                        <th>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    عملیات
                                </button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('admin.departments.edit', ['department' => $department->id]) }}"
                                        class="dropdown-item text-right">
                                        ویرایش
                                    </a>
                                    <a href="{{ route('admin.departments.images.edit', ['department' => $department->id]) }}"
                                        class="dropdown-item text-right"> ویرایش تصاویر
                                    </a>
                                    <a href="{{ route('admin.departments.show', ['department' => $department->id]) }}"
                                        class="dropdown-item text-right">
                                        نمایش
                                    </a>
                                    <form
                                        action="{{ route('admin.departments.destroy', ['department' => $department->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger dropdown-item text-right"
                                            type="submit"> <span class="badge bg-danger text-wrap text-white p-1">حذف کل
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
        <div class="d-flex justify-content-center mt-5">
            {{ $departments->render() }}
        </div>
    </div>
</div>
@endsection