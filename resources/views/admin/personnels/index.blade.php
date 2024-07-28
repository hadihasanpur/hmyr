@extends('admin.layouts.admin')
@section('title')
لبست پرسنل در سایت
@endsection
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="p-4 mb-4 bg-white col-xl-12 col-md-12">
        <div class="mb-4 text-center d-flex flex-column flex-md-row justify-content-md-between">
            <h5 class="mb-3 font-weight-bold mb-md-0">لیست پرسنل </h5>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.personnels.create') }}">
                <i class="fa fa-plus"></i>
                پرسنل جدید
            </a>
        </div>
        <div class="table-responsive">
            <table class="table text-center table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>تصویر</th>
                        <th>نام </th>
                        <th>واحد </th>
                        <th>عنوان شغلی</th>
                        <th> تحصیلات </th>
                        <th> شروع ماموریت </th>
                        <th> اتمام ماموریت </th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personnels as $key => $personnel)
                    <tr class="align-middle">
                        <th class="align-middle font-titr">
                            <a href="{{ route('admin.personnels.show', ['personnel' => $personnel->id]) }}">
                                {{ $personnels->firstItem() + $key }}
                            </a>
                        </th>
                        <th>
                            <div>
                                <img class="rounded-circle" style="width: 50px;height: 50px"
                                    src="{{ url(env('PERSONNEL_IMAGES_UPLOAD_PATH') . $personnel->avatar) }}"
                                    alt="{{ $personnel->name }}">
                            </div>
                        </th>
                        <th class="align-middle">
                            <a href="{{ route('admin.personnels.show', ['personnel' => $personnel->id]) }}">
                                {{ $personnel->name }}
                            </a>
                        </th>
                        <th class="align-middle">
                            @isset($personnel->level1->name)
                            <a href="{{ route('admin.personnels.show', ['personnel' => $personnel->id]) }}">
                                {{ $personnel->level1->name }}
                            </a>
                            @endisset
                            @isset($personnel->level2->name)
                            <a href="{{ route('admin.personnels.show', ['personnel' => $personnel->id]) }}">
                                {{ $personnel->level2->name }}
                            </a>
                            @endisset
                            @isset($personnel->level3->name)
                            <a href="{{ route('admin.personnels.show', ['personnel' => $personnel->id]) }}">
                                {{ $personnel->level3->name }}
                            </a>
                            @endisset
                        </th>
                        <th class="align-middle">
                            <a href="{{ route('admin.personnels.show', ['personnel' => $personnel->id]) }}">
                                {{ $personnel->post }}
                            </a>
                        </th>
                        <th class="align-middle">
                            <a href="{{ route('admin.personnels.show', ['personnel' => $personnel->id]) }}">
                                {{ $personnel->ad }}
                            </a>
                        </th>
                        <th class="align-middle font-titr">
                            <a href="{{ route('admin.personnels.show', ['personnel' => $personnel->id]) }}">
                                {{ verta($personnel->started_at)->format('Y/n/j') }}

                            </a>
                        </th>
                        <th class="align-middle font-titr">
                            <a href="{{ route('admin.personnels.show', ['personnel' => $personnel->id]) }}">
                                {{ verta($personnel->finished_at)->format('Y/n/j') }}
                            </a>
                        </th>
                        <th class="align-middle">
                            <span
                                class="{{ $personnel->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                {{ $personnel->is_active }}
                            </span>
                        <th class="align-middle">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                عملیات
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{ route('admin.personnels.edit', ['personnel' => $personnel->id]) }}"
                                    class="text-right dropdown-item">
                                    ویرایش
                                </a>
                                <a href="{{ route('admin.personnels.show', ['personnel' => $personnel->id]) }}"
                                    class="text-right dropdown-item">
                                    نمایش
                                </a>
                                <form action="{{ route('admin.personnels.destroy', ['personnel' => $personnel->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-right btn btn-sm btn-outline-danger dropdown-item"
                                        type="submit"> <span class="p-1 text-white badge bg-danger text-wrap">حذف
                                            پرسنل</span></button>
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
            {{ $personnels->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection