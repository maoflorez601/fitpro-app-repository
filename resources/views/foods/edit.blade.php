<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Actualizar datos alimento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('foods.update', $food->id) }}" class="bg-gray-900 p-6 rounded-lg">
                    <!-- se define directiva CSRF (Cross-Site Request Forgery) para prevenir falsificación de solicitudes -->
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-gray-300">Nombre</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $food->name) }}"
                        class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>
                
                    <div class="mb-4">
                        <label for="category" class="block text-gray-300">Categoría</label>
                        <input id="category" name="category" type="text" value="{{ old('category', $food->category) }}"
                        class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>
                
                    <div class="mb-4">
                        <label for="protein" class="block text-gray-300">Proteínas</label>
                        <input id="protein" name="protein" type="number" step="0.1" value="{{ old('protein', $food->protein) }}"
                        class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>
                
                    <div class="mb-4">
                        <label for="carbs" class="block text-gray-300">Carbohidratos</label>
                        <input id="carbs" name="carbs" type="number" step="0.1" value="{{ old('carbs', $food->carbs) }}"
                        class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>
                
                    <div class="mb-4">
                        <label for="fat" class="block text-gray-300">Grasas</label>
                        <input id="fat" name="fat" type="number" step="0.1" value="{{ old('fat', $food->fat) }}"
                        class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>
                
                    <div class="flex justify-start">
                        <button type="submit" class="bg-cyan-700 hover:bg-cyan-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">Actualizar</button>
                        <a href="{{ route('foods.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
