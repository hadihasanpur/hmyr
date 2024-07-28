@extends('home.layouts.home')
@section('title')
    صفحه اصلی
@endsection
@section('script')
@endsection
@section('pictorial')
    <div class="mx-auto  container">
    <div class="bg-gray-50 border border-slate-900 rounded-lg shadow-md gap-x-3 gap-y-3 dark:bg-gray-800 dark:border-slate-950 p-4">
        <div id="" class="bg-slate-100 dark:bg-gray-800 dark:border-gray-700">
            <div id="" class="my-1 border rounded-lg border-1 mb-1">
                <div class="flex">
                    <p class="mb-1 mt-4 text-lg font-normal font-titr text-gray-900 top-10 font-vazir  mx-auto dark:text-gray-50">
                        {{ $pictorial->title }}
                    </p>
                </div>
                <div class="flex">
                    <img class="object-scale-down  2xl:max-w-4xl 2xl:h-full mt-4 mx-auto mb-2"
                        src="{{ url(env('PICTORIAL_IMAGES_UPLOAD_PATH') . $pictorial->primary_image) }}"
                        alt="" />
                </div>
                <div class="grid grid-cols-1 px-2">
                    @foreach ($images as $image)
                        <img class="object-none mb-2 2xl:max-w-4xl 2xl:h-full mx-auto"
                            src="{{ url(env('PICTORIAL_IMAGES_UPLOAD_PATH') . $image->image) }}" alt="{{ $pictorial->title }}" />
                    @endforeach
                </div>
            </div>
        </div>
            <div class= "h-auto mb-1 bg-gray-200 border-2 border-gray-400 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 mx-2">
                <a href="{{ route('home.allpictorials') }}">
                    <p class="text-center title1 dark:text-white font-titr "> گزارشات تصویری قبلی</p>
                </a>
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
