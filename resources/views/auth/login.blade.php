<x-<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://media.revistagq.com/photos/60e6c8d727e8735e0f6e92a3/16:9/w_2560,c_limit/DESPLANTES.jpg'); background-size: cover; background-position: center;">
        <img src="{{ asset('images/logo.png') }}" alt="logo_fitpro" class="mb-8 h-20 w-auto" />
        <div class="bg-white rounded-lg shadow-md w-96">
            <div class="p-5 md:p-8">
                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <x-label for="email" value="{{ __('Correo electrónico') }}" />
                        <x-input id="email" class="block mt-1 w-full rounded-md" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mb-4">
                        <x-label for="password" value="{{ __('Contraseña') }}" />
                        <x-input id="password" class="block mt-1 w-full rounded-md" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mb-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recuerdame') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Olvidaste tu contraseña?') }}
                            </a>
                        @endif

                        <x-button>
                            {{ __('Ingresar') }}
                        </x-button>
                    </div>
                </form>

                <div class="mt-4 text-center">
                    <span class="text-sm text-gray-600 dark:text-gray-400">{{ __("No tienes una cuenta?") }}</span>
                    <a href="{{ route('register') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">{{ __('Click aqui') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

<style>
    .mb-4 {
        margin-bottom: 20px;
    }
    
    .p-5 {
        padding: 20px;
    }
    
    .md\:p-8 {
        padding: 32px;
    }
    
    .w-96 {
        width: 24rem; /* 384px */
    }
    
    .shadow-md {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
</style>
