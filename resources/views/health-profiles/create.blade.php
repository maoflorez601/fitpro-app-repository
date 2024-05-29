<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestionar Perfil de Salud') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('healthProfiles.store') }}" class="bg-gray-900 p-6 rounded-lg">
                    <!-- se define directiva CSRF (Cross-Site Request Forgery) para prevenir falsificación de solicitudes -->
                    @csrf
                    <div class="mb-4">
                        <label for="pathology_group" class="block text-gray-300">Grupo de patología</label>
                        <input id="pathology_group" name="pathology_group" type="text" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>
                
                    <div class="mb-4">
                        <label for="pathology" class="block text-gray-300">Patología</label>
                        <input id="pathology" name="pathology" type="text" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>
                
                    <div class="mb-4">
                        <label for="hearth_rate" class="block text-gray-300">Frecuencia cardiaca</label>
                        <input id="hearth_rate" name="hearth_rate" type="number" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>
                
                    <div class="mb-4">
                        <label for="systole" class="block text-gray-300">Sístole</label>
                        <input id="systole" name="systole" type="number" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>
                
                    <div class="mb-4">
                        <label for="diastole" class="block text-gray-300">Diástole</label>
                        <input id="diastole" name="diastole" type="number" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="blood_oxygen" class="block text-gray-300">Oxígeno en sangre</label>
                        <input id="blood_oxygen" name="blood_oxygen" type="number" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="blood_glucose" class="block text-gray-300">Glucosa en sangre</label>
                        <input id="blood_glucose" name="blood_glucose" type="number" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>
                
                    <div class="flex justify-start">
                        <button type="submit" class="bg-cyan-700 hover:bg-cyan-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">Guardar</button>
                        <a href="{{ route('healthProfiles.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
