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

                    <!-- Reset Button -->
                    <form action="{{ route('dashboard.reset') }}" method="POST" class="mb-4">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded"
                            onclick="return confirm('Are you sure you want to delete all registrations?')">Reset All
                            Registrations</button>
                    </form>

                    <!-- Registrations Table -->
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">id-form</th>
                                <th class="border border-gray-300 px-4 py-2">Nama Lengkap</th>
                                <th class="border border-gray-300 px-4 py-2">Jenis Kelamin</th>
                                <th class="border border-gray-300 px-4 py-2">Tanggal Lahir</th>
                                <th class="border border-gray-300 px-4 py-2">Alamat</th>
                                <th class="border border-gray-300 px-4 py-2">NIK</th>
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                                <th class="border border-gray-300 px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($registrations as $registration)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $registration->form_id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $registration->nama_lengkap }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $registration->jenis_kelamin }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $registration->tanggal_lahir }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $registration->alamat_anak }}</td>
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
