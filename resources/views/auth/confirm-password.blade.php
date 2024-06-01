<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://media.revistagq.com/photos/60e6c8d727e8735e0f6e92a3/16:9/w_2560,c_limit/DESPLANTES.jpg'); background-size: cover; background-position: center;">
        <img src="{{ asset('images/logo.png') }}" alt="logo_fitpro" class="mb-8 h-20 w-auto" />
        <div class="bg-white rounded-lg shadow-md w-96">
            <div class="p-5 md:p-8">

                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Esta es un área segura de la aplicación. Confirme su contraseña antes de continuar.') }}
                </div>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="mb-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full rounded-md" type="password" name="password" required autocomplete="current-password" autofocus />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button>
                            {{ __('Confirm') }}
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
