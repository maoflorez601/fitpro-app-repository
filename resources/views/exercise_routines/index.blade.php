<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Rutinas de Ejercicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-4">
                    <a href="{{ route('exercise_routines.create') }}"
                        class="bg-cyan-700 hover:bg-cyan-500 text-white font-bold py-2 px-4 rounded">Crear</a>
                </div>

                <table class="min-w-full divide-y divide-gray-700 bg-gray-800">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                ID</th>
                            <th
                                class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                Nombre</th>
                            <th
                                class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                Descripción</th>
                            <th
                                class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                Calorías Quemadas</th>
                            <th
                                class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                Repeticiones</th>
                            <th
                                class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                Sets</th>
                            <th
                                class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                Duración (minutos)</th>
                            <th
                                class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-900 divide-y divide-gray-700">
                        @foreach ($exerciseRoutines as $exerciseRoutine)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $exerciseRoutine->id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $exerciseRoutine->name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-gray-300">
                                    {{ $exerciseRoutine->description }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-gray-300">
                                    {{ $exerciseRoutine->calories_burned }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-gray-300">
                                    {{ $exerciseRoutine->repetitions }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $exerciseRoutine->sets }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $exerciseRoutine->duration }}
                                </td>
                                <td class="px-4 py-2 whitespace-no-wrap text-gray-300">
                                    <div class="flex justify-center">
                                        <a href="{{ route('exercise_routines.edit', $exerciseRoutine->id) }}"
                                            class="bg-gray-700 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">
                                            Editar
                                        </a>

                                        <button type="button" onclick="confirmDelete('{{ $exerciseRoutine->id }}')"
                                            class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                                            Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function confirmDelete(id) {
        alertify.confirm("¿Está seguro que desea eliminar esta rutina?", function(e) {
            if (e) {
                let form = document.createElement('form')
                form.method = 'POST'
                form.action = `/exercise_routines/${id}`
                form.innerHTML = '@csrf @method('DELETE')'
                document.body.appendChild(form)
                form.submit()
            } else {
                return false
            }
            alertify.success('Eliminado');
        });
    }
</script>
