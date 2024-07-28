@extends('home.layouts.home')
@section('title')
صفحه اصلی
@endsection
@section('script')
@endsection
@section('content')
<div id="c1" class="mx-auto 3xl:container">
    <div id="c2"  class="bg-slate-50 border border-gray-200 rounded-lg shadow-md gap-x-3 gap-y-3 dark:bg-gray-800 dark:border-gray-700 mt-2">
        <div id="c3" class="bg-slate-300 dark:bg-gray-700 dark:border-gray-700 xs:px-1 md:px-8 mt-4">
            <div id="c4" class="my-1 border rounded-lg border-1   bg-gray-200 dark:bg-gray-800 dark:text-white">
                <div class="flex">
                    <img class="xs:h-32 xs:w-200 xs:object-scale-down md:object-contain  2xl:max-w-4xl 2xl:h-full  mt-4 xs:p-1 md:mx-auto mb-4"
                        src="{{ url(env('POST_IMAGES_UPLOAD_PATH') . $content->primary_image) }}"
                        all="" />
                </div>
                <div class="flex">
                    <p class="mb-3 mt-4 text-lg font-normal text-gray-800 dark:text-slate-200 top-10 font-titr  mx-auto text-center	">
                        {{ $content->title }}
                    </p>
                </div>
                <div class="flex">
                    <p class="mb-3 mt-4 text-lg font-normal text-gray-800 dark:text-slate-300 top-10 font-vazir  xs:px-1 px-8 text-justify	">
                        {{ $content->abstract }}
                    </p>
                </div>
                <div class="flex">
                    <p class="mb-10 mt-4 text-lg font-normal text-gray-800 dark:text-slate-300 top-10 font-vazir indent-20 xs:px-1 px-8 text-justify	">
                        {{ $content->description }}
                    </p>
                </div>
                <div class="grid grid-cols-1 px-2">
                    @foreach ($images as $image)
                        <img class="xs:object-cover md:object-contain mb-2 2xl:max-w-4xl mx-auto"
                            src="{{ url(env('POST_IMAGES_UPLOAD_PATH') . $image->image) }}" all="{{ $content->title }}" />
                    @endforeach
                </div>
            </div>
        </div>
         <button id="to-top-button" onclick="goToTop()" title="برو بالا" 
            class="hidden fixed z-50 bottom-10 right-10 p-4 border-0 w-14 h-14 rounded-full shadow-md bg-gray-400 hover:bg-gray-100 text-gray-700 text-lg font-semibold transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path d="M12 4l8 8h-6v8h-4v-8H4l8-8z" />
            </svg>
            <span class="sr-only">برو بالا</span>
        </button>
    </div>
    
</div>
@endsection