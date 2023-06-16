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
            <a class="cursor-pointer" href="ofertas"><img class="inline-block w-16"
                    src="{{ URL::asset('img/logo.svg') }}" /></a>
            @if (Route::has('register'))
                <a class="translationText border border-slate-600 p-2 text-lg text-slate-600 hover:bg-slate-100 hover:text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('register') }}" data-translation-key="registro">
                    Registro
                </a>
            @endif

        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-" :status="session('status')" />
        <div class="container">
            <div>
                <div class="text-5xl text-[#727272] font-bold mb-4 flex justify-center">
                    <p class="translationText" data-translation-key="bienvenido">¡Bienvenido a TravelFree!</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="flex justify-center">
                        <x-text-input id="email" class="email-input block mt-1 w-full pl-14 translationText" type="email"
                            name="email" :value="old('email')" required autofocus autocomplete="username"
                            data-translation-key="email" placeholder="Correo electrónico" />
                    </div>
                    <div class="flex justify-start">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>

                    <!-- Password -->
                    <div class="mt-4 flex justify-center">
                        <x-text-input id="password" class="pass-input block mt-1 w-full pl-14 translationText" type="password"
                            name="password" required autocomplete="current-password" data-translation-key="pass" placeholder="Contraseña" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    {{-- <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div> --}}

                    <div class="flex items-center justify-end mt-4">
                        {{-- @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif --}}

                        <x-primary-button class="bg-slate-500">
                            <p class="text-lg translationText"  data-translation-key="login">Iniciar sesión</p>
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <button class="traducir" id="EnglishButton">English</button>
    <button class="traducir" id="SpanishButton">Español</button>

</body>
