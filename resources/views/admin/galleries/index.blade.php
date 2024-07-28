@extends('admin.layouts.admin')

@section('title')
لیست کل تصاویر
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
        <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
            <h5 class="font-weight-bold mb-3 mb-md-0">لیست تصاویر </h5>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.galleries.create') }}">
                <i class="fa fa-plus"></i>
                ایجاد تصویر
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان تصویر</th>
                        <th>دسته بندی</th>
                        <th>توضیح</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galleries as $key => $gallery)
                    <tr>
                        <th class="font-titr">
                            <a href="{{ route('admin.galleries.edit', ['gallery' => $gallery->id]) }}">
                                {{ $galleries->firstItem() + $key }}
                            </a>
                        </th>
                        <th>
                           <div>
                                <img class="rounded" style="width: 40px;height: 40px"
                                    src="{{ url(env('GALLERY_IMAGES_UPLOAD_PATH') . $gallery->photo) }}" alt="{{ $gallery->name }}">
                            </div>
                        </th>  
                        <th>
                            <a href="{{ route('admin.galleries.edit', ['gallery' => $gallery->id]) }}">
                                {{ $gallery->category }}
                            </a>
                        </th> 
                        <th>
                            <a href="{{ route('admin.galleries.edit', ['gallery' => $gallery->id]) }}">
                                {{ $gallery->description }}
                            </a>
                        </th>
                        <th>
                            <span class="{{ $gallery->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                {{ $gallery->is_active }}
                            </span>
                        </th>
                        <th>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    عملیات
                                </button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('admin.galleries.edit', ['gallery' => $gallery->id]) }}"
                                        class="dropdown-item text-right">
                                        ویرایش
                                    </a>                                   
                                    <form action="{{ route('admin.galleries.destroy', ['gallery' => $gallery->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger dropdown-item text-right"
                                            type="submit"><span class="badge bg-danger text-wrap text-white p-1">حذف  تصویر</span></button>
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
            {{ $galleries->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection