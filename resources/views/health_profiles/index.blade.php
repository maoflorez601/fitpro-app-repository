<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Perfiles de Salud') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-4">
                    <a href="{{ route('health_profiles.create') }}"
                        class="bg-cyan-700 hover:bg-cyan-500 text-white font-bold py-2 px-4 rounded">Crear</a>
                </div>

                <div class="table-container">
                    <table class="min-w-full divide-y divide-gray-700 bg-gray-800">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                    ID</th>
                                <th
                                    class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                    Email usuario</th>
                                <th
                                    class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                    Estatura</th>
                                <th
                                    class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                    Peso</th>
                                <th
                                    class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                    Patología</th>
                                <th
                                    class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                    Frecuencia Cardiaca</th>
                                <th
                                    class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                    Sístole</th>
                                <th
                                    class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                    Diástole</th>
                                <th
                                    class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                    Oxígeno en Sangre</th>
                                <th
                                    class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                    Glucosa en Sangre</th>
                                <th
                                    class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                    Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-900 divide-y divide-gray-700">
                            @foreach ($healthProfiles as $profile)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $profile->id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $profile->user_email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $profile->height }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $profile->weight }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $profile->pathology }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $profile->hearth_rate }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $profile->systole }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $profile->diastole }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $profile->blood_oxygen }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-gray-300">
                                        {{ $profile->blood_glucose }}</td>
                                    <td class="px-4 py-2 whitespace-no-wrap text-gray-300">
                                        <div class="flex justify-center">
                                            <a href="{{ route('health_profiles.edit', $profile->id) }}"
                                                class="bg-gray-700 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">Editar</a>
                                            <button type="button" onclick="confirmDelete('{{ $profile->id }}')"
                                                class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded ml-2">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            alertify.confirm("Está seguro que desea eliminar el elemento?", function(e) {
                if (e) {
                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/health_profiles/${id}`;
                    form.innerHTML = '@csrf @method('DELETE')';
                    document.body.appendChild(form);
                    form.submit();
                } else {
                    return false;
                }
                alertify.success('Ok');
            });
        }        
    </script>

    <style>
        .table-container {
            overflow-x: auto;
        }
    </style>
</x-app-layout>
