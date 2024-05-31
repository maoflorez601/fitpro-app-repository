<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agregar nuevo Perfil de Salud') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('health_profiles.store') }}" class="bg-gray-900 p-6 rounded-lg">
                    @csrf
                    <div class="mb-4">
                        <label for="user_email" class="block text-gray-300">Correo Electrónico</label>
                        <input id="user_email" name="user_email" type="email"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="disease" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Enfermedades
                            Preexistentes:</label>
                        <div class="flex">
                            <select id="disease-select" class="w-full px-3 py-2 rounded-lg bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-600">
                                <option value="">Seleccionar Enfermedad</option>
                                @foreach ($diseases as $disease)
                                    <option value="{{ $disease }}">{{ $disease }}</option>
                                @endforeach
                            </select>
                            <button type="button" id="add-disease" class="ml-2 bg-cyan-700 hover:bg-cyan-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Agregar</button>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Enfermedades Seleccionadas:</label>
                        <div id="disease-tags" class="flex flex-wrap"></div>
                    </div>

                    <input type="hidden" id="diseases" name="pathology">

                    <div class="mb-4">
                        <label for="hearth_rate" class="block text-gray-300">Frecuencia Cardiaca</label>
                        <input id="hearth_rate" name="hearth_rate" type="number"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="systole" class="block text-gray-300">Sístole</label>
                        <input id="systole" name="systole" type="number"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="diastole" class="block text-gray-300">Diástole</label>
                        <input id="diastole" name="diastole" type="number"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="blood_oxygen" class="block text-gray-300">Oxígeno en Sangre</label>
                        <input id="blood_oxygen" name="blood_oxygen" type="number"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="blood_glucose" class="block text-gray-300">Glucosa en Sangre</label>
                        <input id="blood_glucose" name="blood_glucose" type="number"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="height" class="block text-gray-300" aria-placeholder="Centimetros">Altura
                            (cms)</label>
                        <input id="height" name="height" type="number"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="weight" class="block text-gray-300" aria-placeholder="Kilogramos">Peso
                            (kg)</label>
                        <input id="weight" name="weight" type="number"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="flex justify-start">
                        <button type="submit"
                            class="bg-cyan-700 hover:bg-cyan-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">Guardar</button>
                        <a href="{{ route('health_profiles.index') }}"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addDiseaseButton = document.getElementById('add-disease');
            const diseaseSelect = document.getElementById('disease-select');
            const diseaseTagsContainer = document.getElementById('disease-tags');
            const diseasesInput = document.getElementById('diseases');

            let selectedDiseases = [];

            addDiseaseButton.addEventListener('click', function() {
                const selectedDisease = diseaseSelect.value;
                if (selectedDisease && !selectedDiseases.includes(selectedDisease)) {
                    selectedDiseases.push(selectedDisease);

                    // Crear la etiqueta
                    const tag = document.createElement('span');
                    tag.className = 'inline-flex items-center mr-2 mb-2 px-3 py-1 rounded-full bg-cyan-700 text-white';
                    tag.textContent = selectedDisease;

                    // Botón de eliminar la etiqueta
                    const removeButton = document.createElement('button');
                    removeButton.className = 'ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded-full';
                    removeButton.textContent = 'x';
                    removeButton.addEventListener('click', function() {
                        diseaseTagsContainer.removeChild(tag);
                        selectedDiseases = selectedDiseases.filter(disease => disease !== selectedDisease);
                        updateDiseasesInput();
                    });

                    tag.appendChild(removeButton);
                    diseaseTagsContainer.appendChild(tag);

                    updateDiseasesInput();
                }
            });

            function updateDiseasesInput() {
                diseasesInput.value = selectedDiseases.join(',');
            }
        });
    </script>
</x-app-layout>
