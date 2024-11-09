{{-- resources/views/dashboard.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Registrations Table</h3>
                    <div class="flex mb-4 space-x-2">
                        <!-- Reset Button -->
                        <form action="{{ route('dashboard.reset') }}" method="POST" class="mb-4">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded"
                                onclick="return confirm('Are you sure you want to delete all registrations?')">Reset
                                Semua
                                Pendaftaran</button>
                        </form>
                        <a href="{{ route('dashboard.exportExcel') }}"
                            class="bg-green-500 text-white px-4 py-2 rounded">Export Excel
                        </a>
                    </div>

                    <!-- Registrations Table -->
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">No</th>
                                <th class="border border-gray-300 px-4 py-2">ID Formulir</th>
                                <th class="border border-gray-300 px-4 py-2">No. Hp</th>
                                <th class="border border-gray-300 px-4 py-2">Nama Lengkap</th>
                                <th class="border border-gray-300 px-4 py-2">Jenis Kelamin</th>
                                <th class="border border-gray-300 px-4 py-2">Asal Sekolah</th>
                                <th class="border border-gray-300 px-4 py-2">NIK</th>
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                                <th class="border border-gray-300 px-4 py-2">Aksi</th>
                                <th class="border border-gray-300 px-4 py-2">Download Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($registrations as $registration)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $registration->form_id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        {{ $registration->user->no_hp ?? 'N/A' }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $registration->nama_lengkap }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $registration->jenis_kelamin }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $registration->nama_sekolah_dulu }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $registration->nik }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $registration->status }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('registration.show', $registration->id) }}"
                                            class="text-blue-600 hover:underline">View</a>
                                        <a href="{{ route('registration.edit', $registration->id) }}"
                                            class="text-yellow-600 hover:underline ml-2">Edit</a>
                                        <form action="{{ route('registration.destroy', $registration->id) }}"
                                            method="POST" class="inline-block ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline"
                                                onclick="return confirm('Are you sure you want to delete this registration?')">Delete</button>
                                        </form>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('registration.downloadPdf', $registration->id) }}"
                                            class="text-green-600 hover:underline">
                                            Download PDF
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="border border-gray-300 px-4 py-2 text-center">No
                                        registrations found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
