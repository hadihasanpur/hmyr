@extends('admin.layouts.admin')

@section('title')
    index posts
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                <h5 class="font-weight-bold mb-3 mb-md-0">لیست خبرها  </h5>
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.posts.create') }}">
                    <i class="fa fa-plus"></i>
                    ایجاد خبر
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان خبر</th>
                            <th> متن خبر</th>
                            <th>تاریخ درج خبر</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($posts as  $key => $post)
                            <tr>
                               <th>
                                {{ $posts->firstItem() + $key }}
                            </th>
                                <th>
                                    {{ $post->title }}
                                </th>
                                <th>
                                    {{ $post->description }}
                                </th>
                                <th>
                                    {{ $post->date }}
                                </th>
                                <th>
                                    <a class="btn btn-sm btn-outline-success"
                                        href="{{ route('admin.posts.show', ['post' => $post->id]) }}">نمایش</a>
                                    <a class="btn btn-sm btn-outline-info mr-3"
                                        href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">ویرایش</a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $posts->render() }}
            </div>
        </div>

    </div>
@endsection
