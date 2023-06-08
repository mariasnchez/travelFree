@extends('layouts.app')

<head>
    <title>TravelFree</title>
    <style>
        .email-input {
            background-image: url('{{ asset('img/email.svg') }}');
            background-repeat: no-repeat;
            background-position: 10px center;
            padding-left: 40px;
        }

        .pass-input {
            background-image: url('{{ asset('img/pass.svg') }}');
            background-repeat: no-repeat;
            background-position: 10px center;
            padding-left: 40px;
        }

        body {
            overflow: hidden;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 70vh;
        }
    </style>
</head>

<body class="bg-[#ECECEC]">
    <div class="m-10">
        <div class="mb-4 flex justify-between items-center">
            <img class="inline-block w-16" src="{{ URL::asset('img/logo.svg') }}" />
            <a class="border border-slate-600 p-2 text-lg text-slate-600 hover:bg-slate-100 hover:text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('¿Ya registrado?') }}
            </a>
        </div>
        <div class="container">
            <div>
                <div class="text-5xl text-[#727272] font-bold mb-4 flex justify-center">
                    <p>Regístrate en TravelFree</p>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Nombre')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Contraseña')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirma contraseña')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <x-primary-button class="bg-slate-500">
                            <p class="text-lg">{{ __('Registro') }}</p>
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
