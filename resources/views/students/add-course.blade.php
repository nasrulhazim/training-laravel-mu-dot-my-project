<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Student Course for ') . $student->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-4 p-4">

                <form method="POST" action="{{ route('manage-courses.store', $student) }}">
                    @csrf

                    <div class="col-span-6 sm:col-span-4 mb-4">
                        <x-label for="course_id" value="{{ __('Course') }}" />
                        <select class="mt-1 block w-full" id="course_id" name="course_id">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="course_id" class="mt-2" />
                    </div>

                    <x-button>Submit</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
