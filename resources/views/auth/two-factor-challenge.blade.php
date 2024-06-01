<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://media.revistagq.com/photos/60e6c8d727e8735e0f6e92a3/16:9/w_2560,c_limit/DESPLANTES.jpg'); background-size: cover; background-position: center;">
        <img src="{{ asset('images/logo.png') }}" alt="logo_fitpro" class="mb-8 h-20 w-auto" />
        <div class="bg-white rounded-lg shadow-md w-96">
            <div class="p-5 md:p-8" x-data="{ recovery: false }">

                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" x-show="!recovery">
                    {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                </div>

                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" x-show="recovery" x-cloak>
                    {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                </div>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('two-factor.login') }}">
                    @csrf

                    <div class="mb-4" x-show="!recovery">
                        <x-label for="code" value="{{ __('Code') }}" />
                        <x-input id="code" class="block mt-1 w-full rounded-md" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                    </div>

                    <div class="mb-4" x-show="recovery" x-cloak>
                        <x-label for="recovery_code" value="{{ __('Recovery Code') }}" />
                        <x-input id="recovery_code" class="block mt-1 w-full rounded-md" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer" x-show="!recovery" x-on:click="recovery = true; $nextTick(() => { $refs.recovery_code.focus() })">
                            {{ __('Use a recovery code') }}
                        </button>

                        <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer" x-show="recovery" x-cloak x-on:click="recovery = false; $nextTick(() => { $refs.code.focus() })">
                            {{ __('Use an authentication code') }}
                        </button>

                        <x-button class="ms-4">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
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
