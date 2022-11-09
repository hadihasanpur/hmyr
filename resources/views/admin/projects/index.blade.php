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
                        <th>عنوان پروژه</th>
                        <th> کارفرما </th>
                        <th> مشاور </th>
                        <th> محل </th>
                        <th> هزینه اجرا </th>
                        <th>شروع</th>
                        <th>پایان</th>
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
                                {{ $project->employer }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.projects.sdescriptionhow', ['project' => $project->id]) }}">
                                {{ $project->consultant }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.projects.sdescriptionhow', ['project' => $project->id]) }}">
                                {{ $project->location }}
                            </a>
                        </th> <th>
                            <a href="{{ route('admin.projects.sdescriptionhow', ['project' => $project->id]) }}">
                                {{ $project->cost }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                {{ verta($project->start)->format('Y') }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                {{ verta($project->end)->format('Y') }}
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
                                        class="dropdown-item text-right">
                                        ویرایش
                                    </a>

                                    <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}"
                                        class="dropdown-item text-right">
                                        نمایش
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger dropdown-item text-right"
                                            type="submit"> <span class="badge bg-danger text-wrap text-white p-1">حذف کل
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
        <div class="d-flex justify-content-center mt-5">
            {{ $projects->render() }}
        </div>
    </div>
</div>
@endsection