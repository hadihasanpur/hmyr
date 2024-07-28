@extends('home.layouts.form')
@section('title')
صفحه ای وزود
@endsection
@section('content')

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
                <a href="#"
                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">ورود</a>
            </div>
        </li>
    </ol>
</nav>
<div class="h-full px-6 text-gray-800 ">
    <div class="flex flex-wrap items-center justify-center xl:justify-center lg:justify-between font-vazir">
        <div class="mb-4 xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 2xl:w-1/5 md:mb-0">
            <div class="grow-0 shrink-1 md:shrink-0 basis-auto ">
                <img src="{{url('/images/hmyr.webp')}}" class="object-scale-down h-48 mx-auto w-96"
                    alt="Sample image" />
            </div>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <!-- Email input -->
                <div class="mb-6">
                    <input type="email" name="email" placeholder="ایمیل"
                        class="@error('email') mb-1 @enderror form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleFormControlInput2" value="{{ old('email') }}" />
                </div>
                @error('email')
                <div class="input-error-validation">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                <!-- Password input -->
                <div class="mb-6">
                    <input type="password" name="password"
                        class="@error('password') mb-1 @enderror form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleFormControlInput2" placeholder="رمز عبور" />
                    @error('password')
                    <div class="input-error-validation">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-4">
                    <div class="form-group form-check">
                        <input type="checkbox" {{ old('remember') ? 'checked' : '' }}
                            class="float-left w-4 h-4 mt-1 mb-4 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-sm appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                            id="exampleCheck2" />
                        <label class="inline-block text-gray-800 form-check-label" for="exampleCheck2">مرا به خاطر
                            بسپار</label>
                    </div>

                </div>
                <div class="flex items-center justify-between mb-4">
                    <p class="pt-1 mt-2 mb-0 text-sm font-semibold">رمز خود را فراموش کرده اید؟</a>
                        <a href="{{ route('forgot-password') }}"
                            class="text-red-600 transition duration-200 ease-in-out hover:text-red-700 focus:text-red-700">بازیابی</a>
                </div>
                <div class="flex items-center justify-between mb-12 text-center lg:text-left">
                    <p class="pt-1 mt-2 mb-0 text-sm font-semibold">
                        ثبت نام نکرده اید؟
                        <a href="{{ route('register') }}"
                            class="text-red-600 transition duration-200 ease-in-out hover:text-red-700 focus:text-red-700">عضویت</a>
                    </p>
                </div>

                <div class="text-center lg:text-left">
                    <button type="submit"
                        class="inline-block w-full py-3 text-sm font-medium leading-snug text-white uppercase transition duration-150 ease-in-out bg-blue-600 rounded shadow-md px-7 hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg">
                        ورود
                    </button>
                </div>
                
                            <a href="{{ route('provider.login', ['provider' => 'google']) }}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-google  w-full mt-4">
                                                <i class="sli sli-social-google"></i> ورود با حساب گوگل
                            </a>
            </form>
        </div>
    </div>
</div>
@endsection