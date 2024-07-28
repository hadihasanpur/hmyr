@extends('home.layouts.home')
@section('title')
    صفحه اصلی
@endsection
@section('script')
@endsection
@section('auction')
    <div class="mx-auto  container">
        <div class="border border-gray-200 rounded-lg shadow-md gap-x-3 gap-y-3 dark:bg-gray-800 dark:border-gray-700 bg-slate-50">
            <div class="dark:bg-gray-800 dark:border-gray-700">
                <div class="my-1 border rounded-lg border-1 ">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden px-4">
                                    <div class="bg-slate-100 dark:bg-gray-800 dark:border-gray-700">
                                        <div id="" class="my-1 border rounded-lg border-1 mb-2 pb-8 ">
                                            <div class="flex">
                                                <p
                                                    class="mb-1 mt-4 text-lg font-normal text-black dark:text-white top-10 font-vazir  mx-auto">
                                                    {{ $auction->title }}
                                                </p>
                                            </div>
                                            <div class="flex">
                                                <p class="mb-1 mt-4 text-lg font-normal text-black dark:text-white top-10 font-vazir  mx-auto px-8">
                                                    {{ $auction->body }}
                                                </p>
                                            </div>
                                            <div class="grid grid-cols-1 gap-4 px-2 dark:text-white">
                                            <div class="relative overflow-x-auto px-12">
                                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 dark:border-white dark:border dark:border-b-4 ">
                                                    <tbody>
                                                        @foreach ($files as $file)
                                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                            <tr scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                                                    @php
                                                                                                $info = new SplFileInfo($file->file);
                                                                                                    if($info->getExtension() == 'pdf')
                                                                                                    {
                                                                                                @endphp
                                                                                                <i class="fa fa-file-pdf-o px-8 py-4" style="font-size:20px;color:#fd0707">
                                                                                                    <a href="{{ url(env('AUCTION_FILES_UPLOAD_PATH') . $file->file) }}">
                                                                                                                                {{ $file->file }}
                                                                                                    </a>
                                                                                                </i>
                                                                                                @php
                                                                                                    }
                                                                                                    elseif ($info->getExtension() == 'docx') 
                                                                                                    {
                                                                                                @endphp
                                                                                                <i class="fa fa-file-word-o  px-8 py-4" style="font-size:20px;color:rgb(67, 67, 214)">
                                                                                                    <a href="{{ url(env('AUCTION_FILES_UPLOAD_PATH') . $file->file) }}">
                                                                                                                                {{ $file->file }}
                                                                                                    </a>
                                                                                                </i>
                                                                                                @php
                                                                                                    }
                                                                                                    elseif ($info->getExtension() == 'xlsx')
                                                                                                    {
                                                                                                @endphp
                                                                                                <i class="fa fa-file-excel-o px-8 py-4" style="font-size:20px;color:rgb(60, 167, 39)">
                                                                                                    <a href="{{ url(env('AUCTION_FILES_UPLOAD_PATH') . $file->file) }}">
                                                                                                                                {{ $file->file }}
                                                                                                    </a>
                                                                                                </i>
                                                                                                @php
                                                                                                    }
                                                                @endphp
                                                            </tr>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
