<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-4 p-4">
                <form method="POST" action="{{ route('students.update', $student) }}">
                    @csrf
                    @method('PUT')
                    <!-- Name -->
                    <div class="col-span-6 sm:col-span-4 mb-4">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" name="name" type="text" class="mt-1 block w-full"
                            value="{{ $student->name }}"
                            required autocomplete="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4 mb-4">
                        <x-label for="email" value="{{ __('E-mail') }}" />
                        <x-input id="email" name="email" type="text" class="mt-1 block w-full"
                            value="{{ $student->email }}"
                            required autocomplete="email" />
                        <x-input-error for="email" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4 mb-4">
                        <x-label for="ic" value="{{ __('IC') }}" />
                        <x-input id="ic" name="ic" type="text" class="mt-1 block w-full"
                            value="{{ $student->ic }}"
                            required autocomplete="ic" />
                        <x-input-error for="ic" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4 mb-4">
                        <x-label for="phone_number" value="{{ __('Phone Number') }}" />
                        <x-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full"
                        value="{{ $student->phone_number }}"
                            required autocomplete="phone_number" />
                        <x-input-error for="phone_number" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4 mb-4">
                        <x-label for="address" value="{{ __('Address') }}" />
                        <x-input id="address" name="address" type="text" class="mt-1 block w-full"
                            value="{{ $student->address }}"
                            required autocomplete="address" />
                        <x-input-error for="address" class="mt-2" />
                    </div>

                    <x-button>Submit</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
