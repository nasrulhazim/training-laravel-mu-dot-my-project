<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="m-4">
                    <tr>
                        <td class="p-2 text-right">Name:</td>
                        <td class="p-2">{{ $course->name }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="{{ route('courses.edit', $course) }}"
                                class=" inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Edit
                            </a>
                        </td>
                    </tr>
                </table>
            </div>


            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-8">
                <p class="text-2xl m-4 font-bold">Students</p>
                <table class="m-4">
                    <thead>
                        <tr>
                            <th class="w-1/3">Name</th>
                            <th class="w-1/3">E-mail</th>
                            <th class="w-1/3">IC</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($course->students as $student)
                            <tr>
                                <td class="p-2 text-center">{{ $student->name }}</td>
                                <td class="p-2 text-center">{{ $student->email }}</td>
                                <td class="p-2 text-center">{{ $student->ic }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center px-4">No students for this course yet. Consider to
                                    <a href="{{ route('courses.edit', $course) }}">add</a> students to this course.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
