<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://media.revistagq.com/photos/60e6c8d727e8735e0f6e92a3/16:9/w_2560,c_limit/DESPLANTES.jpg'); background-size: cover; background-position: center;">
        <img src="{{ asset('images/logo.png') }}" alt="logo_fitpro" class="mb-8 h-20 w-auto" />
        <div class="bg-white rounded-lg shadow-md w-96">
            <div class="p-5 md:p-8">

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="mb-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full rounded-md" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                    </div>

                    <div class="mb-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full rounded-md" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mb-4">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full rounded-md" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <a href="{{ route('login') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">Cancel</a>
                        <x-button>
                            {{ __('Reset Password') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>

<style>
    .mb-4 {
        padding: 20px;
    }
</style>
