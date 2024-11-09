@extends('layout.app')

@section('title', 'Status Calon Siswa')

@section('content')
    <div class="p-4 md:p-8 bg-white shadow-lg rounded-lg max-w-3xl mx-auto mt-6">
        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-700">Status Pendaftaran</h3>
            <p class="mt-2">
                <span class="inline-block bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-md">
                    {{ $registrationStatus }}
                </span>
            </p>
        </div>
        <div class="mb-8">
            <h3 class="text-xl font-semibold text-gray-700">ID Formulir</h3>
            <p class="mt-2">
                <span class="inline-block bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-md">
                    {{ $formId }}
                </span>
            </p>
        </div>

        <!-- Add Download PDF Section -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
            <div class="text-center mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Informasi Pengembalian Formulir</h3>
                <p class="text-gray-600 mt-2">
                    Setelah mencetak formulir, silakan mengembalikannya langsung ke sekolah beserta kelengkapan yang
                    diperlukan.
                </p>
            </div>

            <div class="text-center">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Download Formulir Pendaftaran</h3>

                @if ($registrationStatus === 'Completed')
                    <a href="{{ route('result.downloadPdf') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-md inline-block transition-all duration-150 ease-in-out">
                        Download Formulir
                    </a>
                @else
                    <button disabled class="bg-gray-300 text-white font-bold py-3 px-6 rounded-md cursor-not-allowed">
                        Download Formulir (Tersedia Jika Status Sudah Complete)
                    </button>
                @endif
            </div>
        </div>
    </div>
@endsection
