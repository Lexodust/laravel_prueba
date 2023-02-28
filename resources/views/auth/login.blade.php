@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="max-w-md w-full">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h1 class="text-2xl font-semibold text-gray-900 mb-6">{{ __('Login') }}</h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-6">
                        <label for="email" class="form-label">{{ __('Email') }}</label>

                        <input id="email" type="email" class="form-input" name="email" value="{{ old('email') }}" required autofocus>

                        @error('email')
                            <span class="text-red-600 text-sm mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="form-label">{{ __('Password') }}</label>

                        <input id="password" type="password" class="form-input" name="password" required>

                        @error('password')
                            <span class="text-red-600 text-sm mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <div class="form-checkbox">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-checkbox-label" for="remember">
                                {{ __('Remember me') }}
                            </label>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="form-button">{{ __('Login') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


