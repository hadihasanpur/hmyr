@extends('home.layouts.home')

@section('title')
پروفایل
@endsection

@section('script')
@endsection
@section('profile')

<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 text-gray-800 ">
    <div class="flex flex-wrap items-center justify-center xl:justify-center lg:justify-between font-vazir">
        <div class="mb-4 xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 2xl:w-1/5 md:mb-0">
            {{-- <div class="grow-0 shrink-1 md:shrink-0 basis-auto ">
                <img src="{{url('/images/hmyr.webp')}}" class="object-scale-down h-48 mx-auto w-96"
                    alt=" آرم سازمان همیاری" />
            </div> --}}
            @if (session('status') === 'profile-information-updated')
            <div class="mb-4 text-sm font-medium text-green-600 content-center">
                اطلاعات پروفایل ویرایش شد!
            </div>
            @endif
          
            <div class="p-4 mb-2 border-2 mt-12">
                <form method="POST" action="/user/profile-information" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    {{-- <div x-data="{photoName: null, photoPreview: null,open: true}"
                        class="col-span-6 sm:col-span-4">
                        <!-- Profile Photo File Input -->
                        <input type="file" class="hidden" wire:model="photo" x-ref="photo" />
                    </div> --}}
                    <div class="w-full" x-data="{photoName: null, photoPreview: null, open: true}"
                        class="col-span-6 sm:col-span-4" x-show="previewUrl !== ''">
                        <div class="w-full max-w-2xl p-8 mx-auto bg-white rounded-lg">
                            <div class="" x-data="imageData()">
                                <img class="rounded-full " style="width: 150px;height: 150px"
                                    src="{{ url(env('PROFILE_IMAGES_UPLOAD_PATH') . Auth::user()->profile_photo_path)  }}"
                                    alt="">
                                <div x-show="previewUrl == ''">
                                    <p class="text-center uppercase text-bold">
                                        <label for="profile_photo_path" class="inline-block w-full  text-xs font-sm text-gray-900 uppercase  bg-slate-300 rounded shadow-md px-7 hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg mt-2"
                                            x-on:click="open = ! open">
                                            بارگزاری تصویر پروفایل
                                        </label>
                                        <input type="file" name="profile_photo_path" id="profile_photo_path"
                                            class="hidden" @change="updatePreview()">
                                    </p>
                                </div>
                                <div x-show="previewUrl !== ''">
                                    <img :src="previewUrl" alt="" class="rounded-full" style="width: 50px;height: 50px">
                                    {{-- <div class="">
                                        <button type="button" class="" @click="clearPreview()">change</button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block mb-1">
                        <label for="name" class="dark:text-white">نام کاربر</label>
                        <input id="name"
                            class="@error('name') @enderror mb-1 form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            type="name" name="name" value="{{ old('name',auth()->user()->name) }}" required autofocus />
                    </div>
                    <div class="block mb-1">
                        <label for="cellphone" class="dark:text-white">تلفن همراه</label>
                        <input id="cellphone"
                            class="@error('cellphone') @enderror mb-1 form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            type="name" name="cellphone" value="{{ old('cellphone',auth()->user()->cellphone) }}" />
                    </div>
                    <div class="block">
                        <label for="email" class="dark:text-white">نام کاربری و ایمیل </label>
                        <input id="email"
                            class="@error('email') @enderror mb-4 form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            type="email" name="email" value="{{ old('email',auth()->user()->email) }}" required />
                    </div>
                    <div class="flex items-center justify-end mt-12">
                        <button
                            class="inline-block w-full py-3 text-sm font-medium leading-snug text-white uppercase transition duration-150 ease-in-out bg-blue-600 rounded shadow-md px-7 hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg">
                            ویرایش پروفایل
                        </button>
                    </div>
                </form>
            </div>
            <div class="p-4 mb-2 border-2">
                @if (session('status') === 'password-updated')
                <div class="mb-4 text-sm font-medium text-green-600">
                    رمز عبور تغییر یافت!
                </div>
                @endif
                <form method="POST" action="/user/password">
                    @csrf
                    @method('put')
                    <input type="password" name="current_password"
                        class="@error('current_password')  @enderror mb-4 form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="رمز فعلی">
                    @error('current_password')
                    <div class="input-error-validation">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    <input type="password" name="password"
                        class="@error('password')  @enderror mb-4 form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="رمز عبور">
                    <input type="password" name="password_confirmation"
                        class="@error('password_confirmation')  @enderror mb-4 form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="تکرار رمز عبور">
                    @error('password_confirmation')
                    <div class="input-error-validation">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    <div class="flex items-center justify-end mt-4">
                        <button
                            class="inline-block w-full py-3 text-sm font-medium leading-snug text-white uppercase transition duration-150 ease-in-out bg-blue-600 rounded shadow-md px-7 hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg">
                            تغییر رمز عبور
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection