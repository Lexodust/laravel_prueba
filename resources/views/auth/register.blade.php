<!-- resources/views/auth/register.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="max-w-md w-full">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h1 class="text-2xl font-semibold text-gray-900 mb-6">{{ __('Register') }}</h1>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 font-medium mb-2">{{ __('Name') }}</label>

                        <input id="name" type="text" class="border border-gray-400 p-2 w-full" name="name" value="{{ old('name') }}" required autofocus>

                        @error('name')
                            <span class="text-red-600 text-sm mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 font-medium mb-2">{{ __('Email') }}</label>

                        <input id="email" type="email" class="border border-gray-400 p-2 w-full" name="email" value="{{ old('email') }}" required>

                        @error('email')
                            <span class="text-red-600 text-sm mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 font-medium mb-2">{{ __('Password') }}</label>

                        <input id="password" type="password" class="border border-gray-400 p-2 w-full" name="password" required>

                        @error('password')
                            <span class="text-red-600 text-sm mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
    <label for="password_confirmation">Confirmar contraseña</label>
    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                    </div>


                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">{{ __('Register') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
