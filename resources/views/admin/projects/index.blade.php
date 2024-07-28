@extends('admin.layouts.admin')
@section('title')
لبست پروژه ها
@endsection
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center d-flex flex-column flex-md-row justify-content-md-between">
            <h5 class="mb-3 font-weight-bold mb-md-0">لیست پروژه ها </h5>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.projects.create') }}">
                <i class="fa fa-plus"></i>
                ایجاد پروزه جدید
            </a>
        </div>
        <div class="table-responsive">
            <table class="table text-center table-bordered table-striped font-titr">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان پروژه</th>
                        <th> کارفرما </th>
                        <th> مشاور </th>
                        <th> محل </th>
                        <th> هزینه اجرا </th>
                        <th>شروع</th>
                        <th>پایان</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $key => $project)
                    <tr>
                        <th>
                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                {{ $projects->firstItem() + $key }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                {{ $project->project }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                {{ $project->employer }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                {{ $project->consultant }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                {{ $project->location }}
                            </a>
                        </th> 
                        <th>
                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                {{ $project->cost }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                {{ verta($project->Projectstart)->format('Y') }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                {{ verta($project->Projectend)->format('Y') }}
                            </a>
                        </th>
                        <th>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    عملیات
                                </button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}"
                                        class="text-right dropdown-item">
                                        ویرایش
                                    </a>

                                    <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}"
                                        class="text-right dropdown-item">
                                        نمایش
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-right btn btn-sm btn-outline-danger dropdown-item"
                                            type="submit"> <span class="p-1 text-white badge bg-danger text-wrap">حذف کل
                                                پروزه</span></button>
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
            {{ $projects->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection