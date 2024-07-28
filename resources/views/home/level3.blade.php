@extends('home.layouts.home')
@section('title')
صفحه اصلی
@endsection
@section('script')
@endsection
@section('level3')
<div class="container mx-auto">
    <div class="flex mx-2 my-1 border rounded-lg border-1">
        <p class="mx-auto mt-4 mb-3 text-lg font-normal text-white top-10 font-vazir">
            {{ $level3->name }}
        </p>
    </div>
    <div class="grid grid-cols-3 px-2 bg-white border border-gray-200 rounded-lg shadow-md gap-x-3 gap-y-3 dark:bg-gray-800 dark:border-gray-700">
        <div id="description" class="col-span-2 bg-sky-100 dark:bg-gray-800 dark:border-gray-700">
            <div id="" class="mx-2 my-1 border rounded-lg border-1">
                <div class="flex">
                    <p class="px-8 mt-8 mb-10 text-lg font-normal text-justify text-white top-10 font-vazir indent-20">
                        {{ $level3->description }}
                    </p>
                </div>
            </div>
        </div>
        <div id="avatar" class="bg-sky-100 dark:bg-gray-800 dark:border-gray-700">
            <div class="grid gap-1 my-1 border rounded-lg border-1">
                <div class="">
                    @isset($level3->modir->avatar)
                    <img class="object-scale-down h-48 px-1 mx-auto mt-2 rounded-lg w-96" data-aos="fade-down" data-aos-delay="400""
                        src=" {{ url(env('MODIR_IMAGES_UPLOAD_PATH') . $level3->modir->avatar) }}"
                    all="" />
                    @endisset
                    <p class="px-1 mt-4 mb-3 text-lg font-normal text-white top-10 font-vazir">
                        {{ $level3->manager }}
                    </p>
                    <p class="px-1 mt-4 mb-3 text-lg font-normal text-white top-10 font-vazir">
                        {{ $level3->ad }}
                    </p>
                    <p class="px-1 mt-4 mb-3 text-lg font-normal text-white top-10 font-vazir">
                        {{ $level3->post }}
                    </p>
                    <p class="px-1 mt-4 mb-3 text-lg font-normal text-white top-10 font-vazir">
                        {{ $level3->tel1 }}
                    </p>
                    <p class="px-1 mt-4 mb-3 text-lg font-normal text-white top-10 font-vazir">
                        {{ $level3->address }}
                    </p>
                </div>
               
               
            </div>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-2 px-2 mx-2 my-1 border rounded-lg border-1">
        @isset($personnels)
        @foreach ($personnels as $personnel)
        <img class="object-none mx-auto w-800 h-400 2xl:max-w-4xl 2xl:h-full"
            src="{{ url(env('PERSONNEL_IMAGES_UPLOAD_PATH') . $personnel->avatar) }}" all="" />
        @endforeach
        @endisset
    
    </div>
    <div class="grid grid-cols-4 gap-2 px-2 mx-2 my-1 border rounded-lg border-1">
        @foreach ($images as $image)
        <img class="object-none mx-auto w-800 h-400 2xl:max-w-4xl 2xl:h-full"
            src="{{ url(env('UNIT_IMAGES_UPLOAD_PATH') . $image->image) }}" all="" />
        @endforeach
    </div>
</div>

@endsection