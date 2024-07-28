@extends('home.layouts.home')
@section('title')
    صفحه اصلی
@endsection
@section('script')
@endsection
@section('level1')
<div class="mx-auto container h-max">
    <div class="flex border rounded-lg border-1 pb-auto  dark:border-gray-700 dark:bg-slate-800">
        <p class="mx-auto mt-4 mb-3 text-lg font-normal text-white top-10 font-titr">
            {{ $level1->name }}
        </p>
    </div>
    <div class="grid grid-cols-3 px-2 border border-gray-200 rounded-lg shadow-md gap-x-3 gap-y-3 dark:bg-gray-900 dark:border-gray-700  pb-auto ">
        <div id="description" class="col-span-2 mt-2 bg-slate-50 border-1 dark:bg-slate-800 dark:border-slate-400 p-4 mb-2 rounded-lg">
            <div id="" class="border rounded-lg border-1 h-auto p-2 dark:border-slate-800 dark:bg-slate-800">
                    <p class="px-8 mt-8 mb-10 text-lg font-normal text-justify text-black dark:text-white top-10 font-vazir indent-20">
                        {!! nl2br($level1->description) !!}
                    </p>
            </div>
        </div>
        <div id="avatar" class="mt-2 bg-slate-50 border-1 dark:bg-slate-800 dark:border-slate-400 p-4 mb-2 rounded-lg">
            <div class="grid gap-1 border rounded-lg border-1 h-fit p-2 dark:border-slate-800 dark:bg-slate-800">
                    @isset($level1->modir->avatar)
                        <img class="object-cover  px-1 mx-auto mt-2 rounded-none "
                            src="{{ url(env('MODIR_IMAGES_UPLOAD_PATH') . $level1->modir->avatar) }}" alt="">
                        <p class="px-1 mt-1 mb-1 text-lg font-normal text-center text-black dark:text-white top-5 font-titr">
                            {{ $level1->modir->name }}
                        </p>
                    @endisset
                    @isset($level1->modir->title)
                        <p
                            class="px-1 mb-1 text-lg font-normal text-center text-black dark:text-white top-5 font-titr">
                            {{ $level1->modir->title }}
                        </p>
                    @endisset
                    @isset($level1->modir->description)
                        <p
                            class="px-1 mb-1 text-lg font-normal text-center text-black dark:text-white top-5 font-titr">
                            {{ $level1->modir->description }}
                        </p>
                    @endempty
                    @isset($level1->modir->ad)
                        <p
                            class="px-1 mb-1 text-lg font-normal text-center text-black dark:text-white top-5 font-titr">
                            {{ $level1->modir->ad }}
                        </p>
                    @endisset
                    @isset($level1->modir->post)
                        <p
                            class="px-1 mb-3 text-lg font-normal text-center text-black dark:text-white top-5 font-titr">
                            {{ $level1->modir->post }}
                        </p>
                    @endisset
            </div>
        </div>
    </div>
    @isset($personnel)
    <div class=" px-2 border border-gray-50 rounded-lg shadow-md gap-x-3 gap-y-3 dark:bg-gray-900 dark:border-gray-700  pb-auto contents">
        <div id="" class=" mt-2 bg-slate-50 border-1 dark:bg-slate-800 dark:border-slate-400 p-4 mb-2 rounded-lg ">
            <div class="grid grid-cols-1 px-2 border border-gray-200 rounded-lg shadow-md gap-x-3 gap-y-3 dark:bg-gray-900 dark:border-gray-100  pb-auto ">
            <div id="" class="grid gap-1 grid-flow-col auto-cols-max border rounded-lg border-1 h-auto p-2 dark:border-slate-800 dark:bg-slate-800 w-fit mx-4">
                @foreach ($personnels as $personnel)
                                <section>
                                    <div class="text-center ">
                                        <div class= " mb-0 text-center px-10">
                                        <div class=" flex flex-col gap-2 min-w-0 rounded break-words border dark:bg-slate-800 bg-slate-100   border-1 border-gray-300 testimonial-card ">
                                                <div class="card-up  dark:bg-slate-800">
                                                </div>
                                                <div class="avatar mx-auto bg-slate-50">
                                                    <img src="{{ url(env('PERSONNEL_IMAGES_UPLOAD_PATH') . $personnel->avatar) }}"
                                                    class="rounded-full max-w-full" />
                                                </div>
                                                <div class="flex-auto p-6 dark:bg-slate-800">
                                                    <h4 class="mb-4 font-titr dark:text-slate-50 text-base">{{ $personnel->name}}</h4>
                                                    <hr />
                                                    <p class="mt-2 font-titr dark:text-slate-50 text-base">
                                                    {{ $personnel->post}}
                                                    </p>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                </section>
                            @endforeach
                    </div>
                </div> 
            </div>
        </div>
        @endisset
        @isset($image)
                <div class="px-2 border border-gray-50 rounded-lg shadow-md gap-x-3 dark:bg-gray-900 dark:border-gray-200 contents">
                    <div id="units_images" class="dark:bg-slate-800 bg-slate-100 ">
                        <div class="mx-auto max-w-2xl px-4  sm:px-6  lg:max-w-7xl lg:px-4">
                            <div class="grid grid-cols-1 gap-x-1 gap-y-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 xl:gap-x-8">
                                         @foreach ($images as $image)
                                                <a href="#" class="group">
                                                 <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7 mt-2  dark:border-gray-200 border">
                                                    <img src="{{ url(env('LEVEL1_IMAGES_UPLOAD_PATH') . $image->image) }}" alt="" class="h-full w-full object-cover object-center group-hover:opacity-75">
                                        </div>
                                        <h3 class="mt-4 text-sm dark:text-gray-50 text-gray-900 text-center"> {{  $image->underImage }}</h3>
                                                </a>
                                         @endforeach
                        </div>
                     </div>
                </div>
        @endisset
            
        <button id="to-top-button" onclick="goToTop()" title="برو بالا" 
            class="hidden fixed z-50 bottom-10 right-10 p-4 border-0 w-14 h-14 rounded-full shadow-md bg-gray-400 hover:bg-gray-100 text-gray-700 text-lg font-semibold transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path d="M12 4l8 8h-6v8h-4v-8H4l8-8z" />
            </svg>
            <span class="sr-only">برو بالا</span>
        </button>
</div>
@endsection
