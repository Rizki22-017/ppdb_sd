<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Registration') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('registration.update', $registration->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Step 1: Data Siswa -->
                    <h3 class="text-lg font-semibold mb-4">Data Siswa</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="nama_lengkap" class="block text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap"
                                value="{{ $registration->nama_lengkap }}" class="form-input mt-1 block w-full">
                        </div>
                        <div>
                            <label for="jenis_kelamin" class="block text-gray-700">Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" id="jenis_kelamin"
                                value="{{ $registration->jenis_kelamin }}" class="form-input mt-1 block w-full">
                        </div>
                        <div>
                            <label for="tempat_lahir" class="block text-gray-700">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                value="{{ $registration->tempat_lahir }}" class="form-input mt-1 block w-full">
                        </div>
                        <div>
                            <label for="tanggal_lahir" class="block text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                value="{{ $registration->tanggal_lahir }}" class="form-input mt-1 block w-full">
                        </div>
                        <!-- Add additional fields for Data Siswa as needed -->
                    </div>

                    <!-- Step 2: Data Orang Tua -->
                    <h3 class="text-lg font-semibold mt-6 mb-4">Data Orang Tua</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="nama_lengkap_ayah" class="block text-gray-700">Nama Lengkap Ayah</label>
                            <input type="text" name="nama_lengkap_ayah" id="nama_lengkap_ayah"
                                value="{{ $registration->nama_lengkap_ayah }}" class="form-input mt-1 block w-full">
                        </div>
                        <div>
                            <label for="nik_ayah" class="block text-gray-700">NIK Ayah</label>
                            <input type="text" name="nik_ayah" id="nik_ayah" value="{{ $registration->nik_ayah }}"
                                class="form-input mt-1 block w-full">
                        </div>
                        <div>
                            <label for="nama_lengkap_ibu" class="block text-gray-700">Nama Lengkap Ibu</label>
                            <input type="text" name="nama_lengkap_ibu" id="nama_lengkap_ibu"
                                value="{{ $registration->nama_lengkap_ibu }}" class="form-input mt-1 block w-full">
                        </div>
                        <div>
                            <label for="nik_ibu" class="block text-gray-700">NIK Ibu</label>
                            <input type="text" name="nik_ibu" id="nik_ibu" value="{{ $registration->nik_ibu }}"
                                class="form-input mt-1 block w-full">
                        </div>
                        <!-- Add additional fields for Data Orang Tua as needed -->
                    </div>

                    <!-- Step 3: Data Wali -->
                    <h3 class="text-lg font-semibold mt-6 mb-4">Data Wali</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="nama_wali" class="block text-gray-700">Nama Wali</label>
                            <input type="text" name="nama_wali" id="nama_wali"
                                value="{{ $registration->nama_wali }}" class="form-input mt-1 block w-full">
                        </div>
                        <div>
                            <label for="tempat_lahir_wali" class="block text-gray-700">Tempat Lahir Wali</label>
                            <input type="text" name="tempat_lahir_wali" id="tempat_lahir_wali"
                                value="{{ $registration->tempat_lahir_wali }}" class="form-input mt-1 block w-full">
                        </div>
                        <div>
                            <label for="tanggal_lahir_wali" class="block text-gray-700">Tanggal Lahir Wali</label>
                            <input type="date" name="tanggal_lahir_wali" id="tanggal_lahir_wali"
                                value="{{ $registration->tanggal_lahir_wali }}" class="form-input mt-1 block w-full">
                        </div>
                        <!-- Add additional fields for Data Wali as needed -->
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 mt-10">
                        Update Registration
                    </button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
