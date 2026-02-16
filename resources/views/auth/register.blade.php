@extends('layouts.guest')
@section('title', '新規登録')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- ユーザ名 --}}
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- 名前（漢字） --}}
        <div class="mt-4">
            <x-input-label for="name_kanji" :value="__('名前（漢字）')" />
            <x-text-input id="name_kanji"
                class="mt-1 block w-full"
                type="text"
                name="name_kanji"
                :value="old('name_kanji')"
                required
                autocomplete="name" />
            <x-input-error :messages="$errors->get('name_kanji')" class="mt-2" />
        </div>


        {{-- 名前（カナ） --}}

        <div class="mt-4">
            <x-input-label for="name_kana" :value="__('名前（カナ）')" />
            <x-text-input id="name_kana"
                class="mt-1 block w-full"
                type="text"
                name="name_kana"
                :value="old('name_kana')"
                required
                autocomplete="name" />
            <x-input-error :messages="$errors->get('name_kana')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="company_name">会社名</label>
            <input id="company_name"
                   type="text"
                   name="company_name"
                   value="{{ old('company_name') }}"
                   class="block mt-1 w-full"
                   required>
        </div>


        {{-- Email --}}
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Password --}}
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password"
                name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Confirm --}}
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('REGISTER') }}
            </x-primary-button>
        </div>
    </form>
@endsection
