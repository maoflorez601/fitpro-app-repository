<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Perfil de Salud') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('health_profiles.update', $healthProfile->id) }}" class="bg-gray-900 p-6 rounded-lg">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="user_email" class="block text-gray-300">Correo Electrónico</label>
                        <input id="user_email" name="user_email" type="email" value="{{ $healthProfile->user_email }}"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="disease" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Enfermedades Preexistentes:</label>
                        <div id="diseases-container" class="mb-2">
                            @foreach ($selectedDiseases as $disease)
                                <span class="inline-block bg-cyan-500 text-white rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2">
                                    {{ $disease }}
                                    <button type="button" class="ml-2 text-red-500" onclick="removeTag(this, '{{ $disease }}')">x</button>
                                </span>
                            @endforeach
                        </div>
                        <select id="disease" name="disease" class="w-full px-3 py-2 rounded-lg bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-600">
                            <option value="">Seleccionar Enfermedad</option>
                            @foreach ($diseases as $disease)
                                <option value="{{ $disease }}">{{ $disease }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="mt-2 bg-cyan-700 hover:bg-cyan-500 text-white font-bold py-2 px-4" onclick="addDisease()">Agregar</button>
                        <input type="hidden" id="diseases-input" name="diseases" value="{{ implode(',', $selectedDiseases) }}">
                    </div>

                    <div class="mb-4">
                        <label for="hearth_rate" class="block text-gray-300">Frecuencia Cardiaca</label>
                        <input id="hearth_rate" name="hearth_rate" type="number" value="{{ $healthProfile->hearth_rate }}"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="systole" class="block text-gray-300">Sístole</label>
                        <input id="systole" name="systole" type="number" value="{{ $healthProfile->systole }}"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="diastole" class="block text-gray-300">Diástole</label>
                        <input id="diastole" name="diastole" type="number" value="{{ $healthProfile->diastole }}"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="blood_oxygen" class="block text-gray-300">Oxígeno en Sangre</label>
                        <input id="blood_oxygen" name="blood_oxygen" type="number" value="{{ $healthProfile->blood_oxygen }}"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="blood_glucose" class="block text-gray-300">Glucosa en Sangre</label>
                        <input id="blood_glucose" name="blood_glucose" type="number" value="{{ $healthProfile->blood_glucose }}"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="height" class="block text-gray-300">Altura (cms)</label>
                        <input id="height" name="height" type="number" value="{{ $healthProfile->height }}"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-gray-300 focus:outline-none focus:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label for="weight" class="block text-gray-300">Peso (kg)</label>
                        <input id="weight" name="weight" type="number" value="{{ $healthProfile->weight }}"
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
        function addDisease() {
            const diseaseSelect = document.getElementById('disease');
            const selectedDisease = diseaseSelect.value;
            if (selectedDisease === "") return;

            const diseasesContainer = document.getElementById('diseases-container');
            const newTag = document.createElement('span');
            newTag.className = "inline-flex items-center mr-2 mb-2 px-3 py-1 rounded-full bg-cyan-700 text-white";
            newTag.innerHTML = `${selectedDisease} <button type="button" class="ml-2 text-red-500" onclick="removeTag(this, '${selectedDisease}')">x</button>`;
            diseasesContainer.appendChild(newTag);

            const diseasesInput = document.getElementById('diseases-input');
            const currentDiseases = diseasesInput.value ? diseasesInput.value.split(',') : [];
            currentDiseases.push(selectedDisease);
            diseasesInput.value = currentDiseases.join(',');

            diseaseSelect.value = "";
        }

        function removeTag(button, disease) {
            const tag = button.parentElement;
            tag.remove();

            const diseasesInput = document.getElementById('diseases-input');
            const currentDiseases = diseasesInput.value.split(',');
            const diseaseIndex = currentDiseases.indexOf(disease);
            if (diseaseIndex > -1) {
                currentDiseases.splice(diseaseIndex, 1);
                diseasesInput.value = currentDiseases.join(',');
            }
        }
    </script>
</x-app-layout>
