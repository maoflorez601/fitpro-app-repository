<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center" style="background-image: url('https://media.revistagq.com/photos/60e6c8d727e8735e0f6e92a3/16:9/w_2560,c_limit/DESPLANTES.jpg'); background-size: cover; background-position: center;">
        <div class="bg-white>
            <x-authentication-card>
                <x-slot name="logo">
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="logo_fitpro" class="block h-20 w-auto" />
                    </div>
                </x-slot>

                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full rounded-md" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full rounded-md" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4 forgpass">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-button class="buttlogin">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
            </x-authentication-card>
        </div>
    </div>
</x-guest-layout>

<style>
    .mforgpass{
    
        padding: 20px 20px 20px 20px;
    }
    
    .buttlogin {
        margin: 20px 20px 20px 20px;
    }
    
    
    
    </style>