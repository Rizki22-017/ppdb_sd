<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Display Registration Status -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-semibold">Status Pendaftaran:</h3>
                    <p class="mt-2">

                        <span class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded">
                            {{ $registrationStatus }}
                        </span>
                    </p>
                </div>
                <div class="max-w-xl mt-5">
                    <h3 class="text-lg font-semibold">ID Formulir:</h3>
                    <p class="mt-2">

                        <span class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded">
                            {{ $formId }}
                        </span>
                    </p>
                </div>

                <!-- Add Download PDF Button -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <h3 class="text-lg font-semibold mb-4">Download Registration Details</h3>

                        @if ($registrationStatus === 'Completed')
                            <a href="{{ route('profile.downloadPdf') }}"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Download Formulir
                            </a>
                        @else
                            <button disabled class="bg-gray-400 text-white font-bold py-2 px-4 rounded">
                                Download Formulir (Tersedia Jika Status Sudah Complete)
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Add Download PDF Button -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{-- button for download the pdf --}}

                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
