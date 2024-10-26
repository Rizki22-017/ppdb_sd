{{-- resources/views/registrations/show.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Registration Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Step 1: Data Siswa -->
                    <h3 class="text-lg font-semibold mb-4">Data Siswa</h3>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div><strong>Nama Lengkap:</strong> {{ $registration->nama_lengkap }}</div>
                        <div><strong>Jenis Kelamin:</strong> {{ $registration->jenis_kelamin }}</div>
                        <div><strong>Tempat Lahir:</strong> {{ $registration->tempat_lahir }}</div>
                        <div><strong>Tanggal Lahir:</strong> {{ $registration->tanggal_lahir }}</div>
                        <div><strong>Tinggi:</strong> {{ $registration->tinggi }} cm</div>
                        <div><strong>Berat:</strong> {{ $registration->berat }} kg</div>
                        <div><strong>Anak Ke-:</strong> {{ $registration->anak_ke }}</div>
                        <div><strong>Jumlah Saudara Kandung:</strong> {{ $registration->jumlah_saudara_kandung }}</div>
                        <div><strong>Jumlah Saudara Tiri:</strong> {{ $registration->jumlah_saudara_tiri }}</div>
                        <div><strong>Jumlah Saudara Angkat:</strong> {{ $registration->jumlah_saudara_angkat }}</div>
                        <div><strong>Bahasa:</strong> {{ $registration->bahasa }}</div>
                        <div><strong>Alamat Anak:</strong> {{ $registration->alamat_anak }}</div>
                        <div><strong>NIK:</strong> {{ $registration->nik }}</div>
                        <div><strong>Nomor KK:</strong> {{ $registration->nomor_kk }}</div>
                        <div><strong>No. Regis Akta:</strong> {{ $registration->no_regis_akta }}</div>
                        <div><strong>Jarak ke Sekolah:</strong> {{ $registration->jarak }}</div>
                        <div><strong>Tempat Tinggal:</strong> {{ $registration->tempat_tinggal }}</div>
                        <div><strong>Transportasi:</strong> {{ implode(', ', $registration->transportasi ?? []) }}
                        </div>
                    </div>

                    <!-- Step 2: Data Orang Tua -->
                    <h3 class="text-lg font-semibold mb-4">Data Orang Tua</h3>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div><strong>Nama Ayah:</strong> {{ $registration->nama_lengkap_ayah }}</div>
                        <div><strong>NIK Ayah:</strong> {{ $registration->nik_ayah }}</div>
                        <div><strong>Nama Ibu:</strong> {{ $registration->nama_lengkap_ibu }}</div>
                        <div><strong>NIK Ibu:</strong> {{ $registration->nik_ibu }}</div>
                        <div><strong>Status Ayah:</strong> {{ $registration->status_ayah }}</div>
                        <div><strong>Status Ibu:</strong> {{ $registration->status_ibu }}</div>
                        <div><strong>Tempat Lahir Ayah:</strong> {{ $registration->tempat_lahir_ayah }}</div>
                        <div><strong>Tanggal Lahir Ayah:</strong> {{ $registration->tanggal_lahir_ayah }}</div>
                        <div><strong>Tempat Lahir Ibu:</strong> {{ $registration->tempat_lahir_ibu }}</div>
                        <div><strong>Tanggal Lahir Ibu:</strong> {{ $registration->tanggal_lahir_ibu }}</div>
                        <div><strong>Alamat Orang Tua:</strong> {{ $registration->alamat_ortu }}</div>
                        <div><strong>Kode Pos:</strong> {{ $registration->kode_pos_ortu }}</div>
                        <div><strong>No. Telepon:</strong> {{ $registration->no_telp_ortu }}</div>
                        <div><strong>Kantor Ayah:</strong> {{ $registration->kantor_ayah }}</div>
                        <div><strong>Kantor Ibu:</strong> {{ $registration->kantor_ibu }}</div>
                        <div><strong>No. HP Ayah:</strong> {{ $registration->no_hp_ayah }}</div>
                        <div><strong>No. HP Ibu:</strong> {{ $registration->no_hp_ibu }}</div>
                        <div><strong>Kawasan Tinggal:</strong> {{ $registration->kawasan_tinggal }}</div>
                        <div><strong>Status Tempat Tinggal:</strong> {{ $registration->status_tempat_tinggal }}</div>
                        <div><strong>Pendidikan Ayah:</strong>
                            {{ $registration->pendidikan_ayah ?? $registration->pendidikan_ayah_lain }}</div>
                        <div><strong>Pendidikan Ibu:</strong>
                            {{ $registration->pendidikan_ibu ?? $registration->pendidikan_ibu_lain }}</div>
                        <div><strong>Pekerjaan Ayah:</strong>
                            {{ $registration->pekerjaan_ayah ?? $registration->pekerjaan_ayah_detail }}</div>
                        <div><strong>Pekerjaan Ibu:</strong>
                            {{ $registration->pekerjaan_ibu ?? $registration->pekerjaan_ibu_detail }}</div>
                        <div><strong>Penghasilan Ayah:</strong> {{ $registration->penghasilan_ayah }}</div>
                        <div><strong>Penghasilan Ibu:</strong> {{ $registration->penghasilan_ibu }}</div>
                    </div>

                    <!-- Tanggungan Section -->
                    <h3 class="text-lg font-semibold mb-4">Data Tanggungan</h3>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        @if (!empty($registration->nama_lengkap_tanggungan) && is_array($registration->nama_lengkap_tanggungan))
                            @foreach ($registration->nama_lengkap_tanggungan as $index => $tanggungan)
                                <div><strong>Nama Tanggungan:</strong> {{ $tanggungan }}</div>
                                <div><strong>Sekolah:</strong> {{ $registration->sekolah_tanggungan[$index] ?? 'N/A' }}
                                </div>
                                <div><strong>Kelas:</strong> {{ $registration->kelas_tanggungan[$index] ?? 'N/A' }}
                                </div>
                                <div><strong>Uang Sekolah:</strong>
                                    {{ $registration->uang_sekolah_tanggungan[$index] ?? 'N/A' }}</div>
                                <div><strong>Keterangan:</strong>
                                    {{ $registration->keterangan_tanggungan[$index] ?? 'N/A' }}</div>
                            @endforeach
                        @else
                            <div class="col-span-2"><em>Tidak ada data tanggungan</em></div>
                        @endif
                    </div>




                    <!-- Step 3: Data Wali -->
                    <h3 class="text-lg font-semibold mb-4">Data Wali</h3>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div><strong>Nama Wali:</strong> {{ $registration->nama_wali }}</div>
                        <div><strong>Tempat Lahir Wali:</strong> {{ $registration->tempat_lahir_wali }}</div>
                        <div><strong>Tanggal Lahir Wali:</strong> {{ $registration->tanggal_lahir_wali }}</div>
                        <div><strong>Pendidikan Wali:</strong> {{ $registration->pendidikan_wali }}</div>
                        <div><strong>Hubungan Murid:</strong> {{ $registration->hubungan_murid_wali }}</div>
                        <div><strong>Tanggungan Wali:</strong> {{ $registration->tanggungan_wali }}</div>
                        <div><strong>Alamat Wali:</strong> {{ $registration->alamat_wali }}</div>
                        <div><strong>Kodepos Wali:</strong> {{ $registration->kodepos_wali }}</div>
                        <div><strong>Telepon Wali:</strong> {{ $registration->telepon_wali }}</div>
                        <div><strong>Alamat Kantor Wali:</strong> {{ $registration->alamat_kantor_wali }}</div>
                    </div>

                    <div class="mt-10 mb-10">
                        <!-- Status Update Form -->
                        <h3 class="text-lg font-semibold mb-4">Ubah Status</h3>
                        <form action="{{ route('registrations.updateStatus', $registration->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="status" class="block font-semibold">Status:</label>
                                <select name="status" id="status" class="border border-gray-300 p-2 rounded">
                                    <option value="Pending"
                                        {{ $registration->status === 'Pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="Incomplete"
                                        {{ $registration->status === 'Incomplete' ? 'selected' : '' }}>Incomplete
                                    </option>
                                    <option value="Complete"
                                        {{ $registration->status === 'Complete' ? 'selected' : '' }}>
                                        Complete</option>
                                </select>
                            </div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update
                                Status</button>
                        </form>
                    </div>

                    <!-- Status and Proof of Payment -->
                    <h3 class="text-lg font-semibold mb-4">Status</h3>
                    <div><strong>Status:</strong> {{ $registration->status }}</div>
                    <div><strong>Bukti Pembayaran:</strong>
                        @if ($registration->bukti_pembayaran)
                            <a href="{{ asset('storage/' . $registration->bukti_pembayaran) }}" target="_blank">Lihat
                                Bukti Pembayaran</a>
                        @else
                            Tidak ada bukti pembayaran
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
