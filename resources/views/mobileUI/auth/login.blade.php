@extends('mobileUI.parent.master')
@section('content')
<div class="container d-flex justify-content-center">
    <div class="card p-10 bg-light" style="border-radius: 20px">

        <div class="card-body">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('client.login.store') }}">

                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="d-flex justify-content-between mt-4">

                    <div class="d-flex align-items-start flex-column">

                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('client.forgot-password') }}">

                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('client.register') }}">
                            {{ __('New here?') }}
                        </a>

                    </div>
                    <div class="align-self-center">

                        <x-primary-button class="ml-3 bg-dark">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
