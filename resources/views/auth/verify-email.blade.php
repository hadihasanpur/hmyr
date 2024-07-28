@extends('home.layouts.form')

@section('title')
صفحه ای وزود
@endsection

@section('content')
<div class="login-register-area pt-50 pb-100" style="direction: rtl;">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-7 col-md-12">
                <div class="login-register-wrapper">
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    @if (session('status'))
                                    <div class="mb-4 text-sm font-medium text-green-600">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                    @if (session('status') == 'verification-link-sent')
                                    <div class="mb-4 text-sm font-medium text-green-600">
                                        {{ __('A new verification link has been sent to the email address you provided
                                        in your profile settings.') }}
                                    </div>
                                    @endif
                                    <div class="flex items-center justify-between mt-4">
                                        <form method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                            <div>
                                                <button type="submit">
                                                    {{ __('Resend Verification Email') }}
                                                </button>
                                            </div>
                                        </form>
                                        <div>
                                            {{-- <a href="{{ route('profile.show') }}"
                                                class="text-sm text-gray-600 underline hover:text-gray-900">
                                                {{ __('Edit Profile') }}</a> --}}
                                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                                @csrf
                                                <button type="submit"
                                                    class="ml-2 text-sm text-gray-600 underline hover:text-gray-900">
                                                    {{ __('Log Out') }}
                                                </button>
                                            </form>
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