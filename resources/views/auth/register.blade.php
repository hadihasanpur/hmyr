@extends('home.layouts.form')

@section('title')
صفحه عضویت
@endsection

@section('content')

{{-- <nav class="w-full px-5 py-3 bg-gray-100 rounded-md">
    <ol class="flex list-reset">
        <li><a href="{{ route('home.index') }}" class="text-blue-600 hover:text-blue-700">صفحه اصلی</a></li>
        <li><span class="mx-2 text-gray-500 active">/عضویت</span></li>
    </ol>
</nav> --}}

<nav class="flex px-5 py-3 bg-gray-100 rounded-md" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
            <a href="{{ route('home.index') }}"
                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                    </path>
                </svg>
                صفحه اصلی/
            </a>
        </li>
        <li>
            <div class="flex items-center">
                
                <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">عضویت</a>
            </div>
        </nav>
<div class="h-full px-6 text-gray-800 ">
    <div class="flex flex-wrap items-center justify-center xl:justify-center lg:justify-between font-vazir">
        <div class="mb-4 xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 2xl:w-1/5 md:mb-0">
            <div class="grow-0 shrink-1 md:shrink-0 basis-auto ">
                <img src="{{url('/images/hmyr.webp')}}" class="object-scale-down h-48 mx-auto w-96"
                    alt="Sample image" />
            </div>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <input name="name" placeholder="نام" 
                class="@error('name') @enderror mb-2 form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    value="{{ old('name') }}">
                @error('name')
                <div class="input-error-validation">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror

                <input name="email" placeholder="ایمیل" 
                class="@error('email') @enderror mb-2 form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    value="{{ old('email') }}">
                @error('email')
                <div class="input-error-validation">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror

                <input type="password" name="password" 
                class="@error('password') @enderror  mb-2 form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="رمز عبور">
                @error('password')
                <div class="input-error-validation">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror

                <input type="password" name="password_confirmation"
                    class="@error('password_confirmation') @enderror  mb-2 form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="تکرار رمز عبور">
                @error('password_confirmation')
                <div class="input-error-validation">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror

                <div class="button-box">
                    <button class="inline-block w-full py-3 text-sm font-medium leading-snug text-white uppercase transition duration-150 ease-in-out bg-blue-600 rounded shadow-md px-7 hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg"  
                    type="submit">عضویت</button>
                    <a href="{{ route('provider.login' , ['provider' => 'google']) }}"
                        class="mt-2 btn btn-google btn-block">
                        <i class="sli sli-social-google"></i>
                        ایجاد اکانت با گوگل
                    </a>
                </div>
        </div>
    </div>
    </div>

    @endsection