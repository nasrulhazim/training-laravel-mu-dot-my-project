<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="m-4">
                    <tr>
                        <td class="p-2 text-right">Name:</td>
                        <td class="p-2">{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <td class="p-2 text-right">E-mail:</td>
                        <td class="p-2">{{ $student->email }}</td>
                    </tr>
                    <tr>
                        <td class="p-2 text-right">IC:</td>
                        <td class="p-2">{{ $student->ic }}</td>
                    </tr>
                    <tr>
                        <td class="p-2 text-right">Phone Number:</td>
                        <td class="p-2">{{ $student->phone_number }}</td>
                    </tr>
                    <tr>
                        <td class="p-2 text-right">Address:</td>
                        <td class="p-2">{{ $student->address }}</td>
                    </tr>
                    <tr>
                        <td class="p-2 text-right">Registered At:</td>
                        <td class="p-2">{{ $student->created_at->format('d-M-Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="{{ route('students.edit', $student) }}"
                                class=" inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Edit
                            </a>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="flex justify-end my-4">
                <a href="{{ route('manage-courses.create', $student) }}" class="bg-indigo-700 rounded-md text-white py-2 px-4 hover:bg-indigo-500">Register
                    Course</a>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-4">

                <p class="text-2xl m-4 font-bold">Courses</p>

                <table class="m-4">
                    <tr>
                        <th class="w-2/3">Course</th>
                        <th class="w-1/3">Action</th>
                    </tr>
                    @forelse ($student->courses as $course)
                        <tr>
                            <td class="p-2 w-2/3">{{ $course->name }}</td>
                            <td class="p-2 w-1/3">

                                <div>
                                    <form method="POST" action="{{ route('manage-courses.destroy', $student, $course) }}">
                                        @csrf @method('DELETE')

                                        <div class="px-1 cursor-pointer"
                                            onclick="if(confirm('Are you sure want to delete {{ $student->name }}?')) {
                                                        this.parentElement.submit()
                                                    }">
                                            🗑️
                                        </div>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">This student didn't register to any courses.</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
