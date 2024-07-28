@extends('home.layouts.form')

@section('title')
صفحه وزود
@endsection

@section('content')

<div class="breadcrumb-area pt-15 pb-15 bg-gray" style="direction: rtl;">
    <div class="container">
        <div class="text-center breadcrumb-content">
            <ul>
                <li>
                    <a href="{{ route('home.index') }}">صفحه ای اصلی</a>
                </li>
                <li class="active"> ورود </li>
            </ul>
        </div>
    </div>
</div>

<div class="px-6 h-full text-gray-800 ">
    <div class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap font-vazir">
        <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 2xl:w-1/5 mb-4 md:mb-0">
            <div class="grow-0 shrink-1 md:shrink-0 basis-auto  ">
                <img src="{{url('/images/hmyr.webp')}}" class="mx-auto object-scale-down h-48 w-96"
                    alt="Sample image" />
            </div>
            <form action="{{ route('reset-password') }}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <input name="email" placeholder="ایمیل"
                    class="@error('email') @enderror mb-4 form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    type="email" value="{{ old('email',$request->email) }}" autofocus>

                @error('email')
                <div class="input-error-validation">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror

                <input type="password" name="password"
                    class="@error('password')  @enderror mb-4 form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="رمز عبور">

                @error('password')
                <div class="input-error-validation">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                <input type="password" name="password_confirmation"
                    class="@error('password_confirmation')  @enderror mb-8 form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="تکرار رمز عبور">
                    
                @error('password_confirmation')
                <div class="input-error-validation">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror

                <div class="button-box">
                    <button
                        class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
                        type="submit">بازیابی</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection