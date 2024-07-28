@extends('home.layouts.home')
@section('title')
صفحه اصلی
@endsection
@section('script')
@endsection
@section('level2')
<div class=" mx-auto container h-max">
    <div class="flex border rounded-lg border-1 pb-auto  dark:border-gray-700 dark:bg-slate-800">
        <p class="mx-auto mt-4 mb-3 text-lg font-normal text-white top-10 font-vazir">
            {{ $level2->name }}
        </p>
    </div>
    <div class="grid grid-cols-3 px-2 bg-white border border-gray-200 rounded-lg shadow-md gap-x-3 gap-y-3 dark:bg-gray-800 dark:border-gray-700">
        <div id="description" class="col-span-2 mt-2 bg-slate-50 border-1 dark:bg-slate-800 dark:border-slate-400 p-4 mb-2 rounded-lg">
            <div id="" class="border rounded-lg border-1 h-auto p-2 dark:border-slate-800 dark:bg-slate-800">
                <div class="flex">
                    <p class="px-8 mt-8 mb-10 text-lg font-normal text-justify text-black dark:text-white top-10 font-vazir indent-20">
                        {{ $level2->description }}
                    </p>
                </div>
            </div>
        </div>
        <div id="avatar" class="mt-2 bg-slate-50 border-1 dark:bg-slate-800 dark:border-slate-400 p-4 mb-2 rounded-lg">
            <div class="grid gap-1 border rounded-lg border-1 h-fit p-2 dark:border-slate-800 dark:bg-slate-800">
                <div class="">
                    @isset($level2->modir->avatar)
                    <img class="object-scale-down h-48 px-1 mx-auto mt-2 rounded-lg w-96" data-aos="fade-down" data-aos-delay="400""
                        src=" {{ url(env('MODIR_IMAGES_UPLOAD_PATH') . $level2->modir->avatar) }}"
                    all="" />
                    @endisset
                    <p class="px-1 mt-1 mb-1 text-lg font-normal text-center text-black dark:text-white top-5 font-titr">
                        {{ $level2->modir->name }}
                    </p>
                    <p class="px-1 mt-1 mb-1 text-lg font-normal text-center text-black dark:text-white top-5 font-titr">
                        {{ $level2->modir->title }}
                    </p>
                    <p class="px-1 mt-1 mb-1 text-lg font-normal text-center text-black dark:text-white top-5 font-titr">
                        {{ $level2->modir->ad }}
                    </p>
                    <p class="px-1 mt-1 mb-1 text-lg font-normal text-center text-black dark:text-white top-5 font-titr">
                        {{ $level2->post }}
                    </p>
                    <p class="px-1 mt-1 mb-1 text-lg font-normal text-center text-black dark:text-white top-5 font-titr">
                        {{ $level2->modir->mobile }}
                    </p>
                </div>
            </div>
    </div>
    </div>
    @isset($personnels->avatar)
        <div class="grid grid-cols-4 gap-2 px-2 mx-2 my-1 border rounded-lg border-1">
            @foreach ($personnels as $personnel)
            <img class="object-none mx-auto w-800 h-400 2xl:max-w-4xl 2xl:h-full"
                src="{{ url(env('PERSONNEL_IMAGES_UPLOAD_PATH') . $personnel->avatar) }}" all="" />
            @endforeach
        </div>
        
    @endisset
        <div class="grid grid-cols-3 gap-2 px-1 mx-1 mt-1 border rounded-lg border-1">
            @foreach ($images as $image)
            <img class="object-none mx-auto w-800 h-400 2xl:max-w-4xl 2xl:h-full"
            src="{{ url(env('LEVEL1_IMAGES_UPLOAD_PATH') . $image->image) }}" all="" />
            @endforeach
        </div>
    </div>
</div>
@endsection