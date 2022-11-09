@extends('admin.layouts.admin')
@section('title')
لبست مرایدها
@endsection
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
        <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
            <h5 class="font-weight-bold mb-3 mb-md-0">لیست مزایده ها </h5>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.auctions.create') }}">
                <i class="fa fa-plus"></i>
                ایجاد مزایده
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان مزایده</th>
                        <th>تاریخ درج مزایده</th>
                        <th>تاریخ شروع</th>
                        <th>تاریخ اتمام</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($auctions as $key => $auction)
                    <tr>
                        <th>
                            <a href="{{ route('admin.auctions.show', ['auction' => $auction->id]) }}">
                                {{ $auctions->firstItem() + $key }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.auctions.show', ['auction' => $auction->id]) }}">
                                {{ $auction->title }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.auctions.show', ['auction' => $auction->id]) }}">
                                {{ verta($auction->created_at) }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.auctions.show', ['auction' => $auction->id]) }}">
                                {{ verta($auction->started_at)->format('Y.m.d') }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.auctions.show', ['auction' => $auction->id]) }}">
                                {{ verta($auction->finished_at)->format('Y.m.d') }}
                            </a>
                        </th>
                        <th>
                            <span class="{{ $auction->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                {{ $auction->is_active }}
                            </span>
                        </th>
                        <th>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    عملیات
                                </button>
                                <div class="dropdown-menu">

                                    <a href="{{ route('admin.auctions.edit', ['auction' => $auction->id]) }}"
                                        class="dropdown-item text-right">
                                        ویرایش
                                    </a>
                                    <a href="{{ route('admin.auctions.files.edit', ['auction' => $auction->id]) }}"
                                        class="dropdown-item text-right">حذف و اضافه اسناد 
                                    </a>
                                    <a href="{{ route('admin.auctions.show', ['auction' => $auction->id]) }}" class="dropdown-item text-right">
                                        نمایش
                                    </a>
                                    <form action="{{ route('admin.auctions.destroy', ['auction' => $auction->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger dropdown-item text-right"
                                            type="submit">  <span class="badge bg-danger text-wrap text-white p-1">حذف کل مزایده</span></button>
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
            {{ $auctions->render() }}
        </div>
    </div>
</div>
@endsection