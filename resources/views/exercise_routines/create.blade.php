<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agregar Rutina de Ejercicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('exercise_routines.store') }}" class="bg-gray-900 p-6 rounded-lg">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-300">Nombre de la Rutina</label>
                        <input id="name" name="name" type="text" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-300">Descripción</label>
                        <textarea id="description" name="description" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="calories_burned" class="block text-gray-300">Calorías Quemadas</label>
                        <input id="calories_burned" name="calories_burned" type="number" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="repetitions" class="block text-gray-300">Número de Repeticiones</label>
                        <input id="repetitions" name="repetitions" type="number" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="sets" class="block text-gray-300">Número de Sets</label>
                        <input id="sets" name="sets" type="number" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="duration" class="block text-gray-300">Duración (minutos)</label>
                        <input id="duration" name="duration" type="number" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="flex justify-start">
                        <button type="submit" class="bg-cyan-700 hover:bg-cyan-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">Guardar</button>
                        <a href="{{ route('exercise_routines.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
