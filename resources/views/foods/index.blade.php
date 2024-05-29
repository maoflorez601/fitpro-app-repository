<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de alimentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-welcome /> --}}
                <div class="p-4">
                    <a href="{{ route('foods.create') }}"
                        class="bg-cyan-700 hover:bg-cyan-500 text-white font-bold py-2 px-4 rounded">Create</a>
                </div>

                <table class="min-w-full divide-y divide-gray-700 bg-gray-800">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                ID</th>
                            <th
                                class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                Name</th>
                            <th
                                class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                Category</th>
                            <th
                                class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                Protein</th>
                            <th
                                class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                Carbs</th>
                            <th
                                class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                Fat</th>
                            <th
                                class="px-6 py-3 bg-gray-700 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-900 divide-y divide-gray-700">
                        @foreach ($foods as $food)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $food->id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $food->name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $food->category }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $food->protein }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $food->carbs }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-gray-300">{{ $food->fat }}</td>
                                <td class="px-4 py-2 whitespace-no-wrap text-gray-300">
                                    <div class="flex justify-center">
                                        <a href="{{ route('foods.edit', $food->id) }}"
                                            class="bg-gray-700 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">
                                            Edit
                                        </a>

                                        <button type="button" onclick="confirmDelete('{{ $food->id }}')"
                                            class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                                            Delete
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
        alertify.confirm("This is a confirm dialog.", function(e) {
            if (e) {
                let form = document.createElement('form')
                form.method = 'POST'
                form.action = `/foods/${id}`
                form.innerHTML = '@csrf @method("DELETE")'
                document.body.appendChild(form)
                form.submit()

            } else {
                return false
            }
            alertify.success('Ok');
        })
    }
</script>
