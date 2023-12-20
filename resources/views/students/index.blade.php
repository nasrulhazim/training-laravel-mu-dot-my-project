<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('create', \App\Models\Student::class)
                <div class="flex justify-end m-4  overflow-x-auto">
                    <a href="{{ route('students.create') }}"
                        class="bg-indigo-700 rounded-md text-white py-2 px-4 hover:bg-indigo-500">Create New Student</a>
                </div>
            @endcan
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-end m-4  overflow-x-auto">
                    {{ $students->links() }}
                </div>
                <table class="m-4 ">
                    <thead>
                        <tr>
                            <th class="w-1/4">Name</th>
                            <th class="w-1/4">E-mail</th>
                            <th class="w-1/4">IC</th>
                            <th class="w-1/4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td class="p-2">{{ $student->name }}</td>
                                <td class="p-2">{{ $student->email }}</td>
                                <td class="p-2">{{ $student->ic }}</td>
                                <td class="p-2">
                                    <div class="grid grid-flow-col grid-cols-3 gap-x-2">
                                        @can('view', $student)
                                            <a href="{{ route('students.show', $student) }}">👁️</a>
                                        @endcan
                                        @can('update', $student)
                                            <a href="{{ route('students.edit', $student) }}">✏️</a>
                                        @endcan
                                        @can('delete', $student)
                                            <div>
                                                <form method="POST" action="{{ route('students.destroy', $student) }}">
                                                    @csrf @method('DELETE')

                                                    <div class="px-1 cursor-pointer"
                                                        onclick="if(confirm('Are you sure want to delete {{ $student->name }}?')) {
                                                        this.parentElement.submit()
                                                    }">
                                                        🗑️
                                                    </div>
                                                </form>
                                            </div>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-end m-4">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
