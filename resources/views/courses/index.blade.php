<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('create', \App\Models\Course::class)
                <div class="flex justify-end m-4  overflow-x-auto">
                    <a href="{{ route('courses.create') }}"
                        class="bg-indigo-700 rounded-md text-white py-2 px-4 hover:bg-indigo-500">Create New Course</a>
                </div>
            @endcan
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-end m-4  overflow-x-auto">
                    {{ $courses->links() }}
                </div>
                <table class="m-4 ">
                    <thead>
                        <tr>
                            <th class="w-3/4">Name</th>
                            <th class="w-1/4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td class="p-2">{{ $course->name }}</td>
                                <td class="p-2">
                                    <div class="grid grid-flow-col grid-cols-3 gap-x-2">
                                        @can('view', $course)
                                            <a href="{{ route('courses.show', $course) }}">👁️</a>
                                        @endcan
                                        @can('update', $course)
                                            <a href="{{ route('courses.edit', $course) }}">✏️</a>
                                        @endcan
                                        @can('delete', $course)
                                            <div>
                                                <form method="POST" action="{{ route('courses.destroy', $course) }}">
                                                    @csrf @method('DELETE')

                                                    <div class="px-1 cursor-pointer"
                                                        onclick="if(confirm('Are you sure want to delete {{ $course->name }}?')) {
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
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
