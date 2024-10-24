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
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">#</th>
                                <th class="border border-gray-300 px-4 py-2">Nama Lengkap</th>
                                <th class="border border-gray-300 px-4 py-2">Jenis Kelamin</th>
                                <th class="border border-gray-300 px-4 py-2">Tanggal Lahir</th>
                                <th class="border border-gray-300 px-4 py-2">Alamat</th>
                                <th class="border border-gray-300 px-4 py-2">No. KK</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($registrations as $registration)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $registration->namaLengkap }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $registration->jenisKelamin }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $registration->tanggalLahir }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $registration->alamatAnak }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $registration->nomorKK }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="#" class="text-blue-600 hover:underline">View</a>
                                        <a href="#" class="text-yellow-600 hover:underline ml-2">Edit</a>
                                        <a href="#" class="text-red-600 hover:underline ml-2">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="border border-gray-300 px-4 py-2 text-center">No
                                        registrations found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
