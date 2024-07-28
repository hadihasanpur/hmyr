@extends('admin.layouts.admin')
@section('title')
لبست پیوندها
@endsection
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center d-flex flex-column flex-md-row justify-content-md-between">
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.links.create') }}">
                <i class="fa fa-plus"></i>
                    پیوند جدید
            </a>
        </div>
        <div class="table-responsive">
            <table class="table text-center table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان </th>
                        <th>لینک</th>
                        <th>وضعیت</th>
                        <th>گروه</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($links as $key => $link)
                    <tr class="align-middle">
                        <th class="align-middle font-titr">
                            <a href="{{ route('admin.links.show', ['link' => $link->id]) }}">
                                {{ $links->firstItem() + $key }}
                            </a>
                        </th>
                        
                        <th class="align-middle">
                            <a href="{{ route('admin.links.show', ['link' => $link->id]) }}">
                                {{ $link->title }}
                            </a>
                        </th>
                        <th class="align-middle">
                            <a href="{{ route('admin.links.show', ['link' => $link->id]) }}">
                                {{ $link->link }}
                            </a>
                        </th>
                        <th class="align-middle">
                            <span class="{{ $link->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                {{ $link->is_active }}
                            </span>
                        </th>
                        <th class="align-middle">
                            <span class="{{ $link->getRawOriginal('group') ? 'text-success' : 'text-danger' }}">
                                {{ $link->group }}
                            </span>
                        </th>
                        <th class="align-middle">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    عملیات
                                </button>
                                <div class="dropdown-menu">

                                    <a href="{{ route('admin.links.edit', ['link' => $link->id]) }}"
                                        class="text-right dropdown-item">
                                        ویرایش
                                    </a>

                                    <a href="{{ route('admin.links.show', ['link' => $link->id]) }}"
                                        class="text-right dropdown-item">
                                        نمایش
                                    </a>
                                    <form action="{{ route('admin.links.destroy', ['link' => $link->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-right btn btn-sm btn-outline-danger dropdown-item"
                                            type="submit"> <span class="p-1 text-white badge bg-danger text-wrap">حذف
                                                لینک</span></button>
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
            {{ $links->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection