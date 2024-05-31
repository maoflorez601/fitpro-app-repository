<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Rutina de Ejercicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('exercise_routines.update', $exerciseRoutine->id) }}" class="bg-gray-900 p-6 rounded-lg">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-gray-300">Nombre</label>
                        <input id="name" name="name" type="text" value="{{ $exerciseRoutine->name }}" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>
                
                    <div class="mb-4">
                        <label for="description" class="block text-gray-300">Descripción</label>
                        <textarea id="description" name="description" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">{{ $exerciseRoutine->description }}</textarea>
                    </div>
                
                    <div class="mb-4">
                        <label for="calories_burned" class="block text-gray-300">Calorías Quemadas</label>
                        <input id="calories_burned" name="calories_burned" type="number" step="0.1" value="{{ $exerciseRoutine->calories_burned }}" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>
                
                    <div class="mb-4">
                        <label for="repetitions" class="block text-gray-300">Repeticiones</label>
                        <input id="repetitions" name="repetitions" type="number" value="{{ $exerciseRoutine->repetitions }}" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>
                
                    <div class="mb-4">
                        <label for="sets" class="block text-gray-300">Sets</label>
                        <input id="sets" name="sets" type="number" value="{{ $exerciseRoutine->sets }}" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>
                
                    <div class="mb-4">
                        <label for="duration" class="block text-gray-300">Duración (minutos)</label>
                        <input id="duration" name="duration" type="number" value="{{ $exerciseRoutine->duration }}" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
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
