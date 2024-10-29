@extends('layout.app')
@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container">
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">Pendaftaran Siswa Baru</li>
                    </ol>
                </nav>
                <h1>Pendaftaran Siswa Baru</h1>
            </div>
        </div>

        <!-- Features Section -->
        <section id="features" class="features section">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
                        <li class="nav-item">
                            <a class="nav-link active show" href="#" aria-disabled="true">
                                <h4>Step 2 : Data Orang Tua</h4>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                    <form action="{{ route('step2.post', $user_id) }}" method="POST" id="step2Form">
                        @csrf
                        <input type="hidden" name="step" value="2">
                        <input type="hidden" name="user_id" value="{{ $registration->user_id }}">
                        <!-- Parent Information Section -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Data Orang Tua</h5>
                                        <div class="mb-3">
                                            <label for="namaLengkapAyah" class="form-label">Nama Lengkap Ayah <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="namaLengkapAyah"
                                                name="nama_lengkap_ayah" value="{{ old('nama_lengkap_ayah', $registration->nama_lengkap_ayah ?? '') }}"
                                                required placeholder="Masukan nama lengkap ayah">
                                            <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="nikAyah" class="form-label">NIK Ayah<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="nikAyah" name="nik_ayah"
                                            value="{{ old('nik_ayah', $registration->nik_ayah ?? '')}}"
                                            required placeholder="Masukan NIK ayah" maxlength="16" pattern="\d{16}"
                                                title="NIK harus 16 digit angka">
                                            <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="namaLengkapIbu" class="form-label">Nama Lengkap Ibu <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="namaLengkapIbu"
                                                name="nama_lengkap_ibu" value="{{ old('nama_lengkap_bu', $registration->nama_lengkap_ibu ?? '')}}"
                                                required placeholder="Masukan nama lengkap ayah">
                                            <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="nikAyah" class="form-label">NIK Ibu<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="nikIbu" name="nik_ibu"
                                                value="{{ old('nik_ibu', $registration->nik_ibu ?? '')}}"
                                                required placeholder="Masukan NIK ayah" maxlength="16" pattern="\d{16}"
                                                title="NIK harus 16 digit angka">
                                            <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                        </div>
                                        <div class="row mb-3">
                                            <legend class="col-form-label col-sm-2 pt-0">Status Ayah</legend>
                                            <div class="col-sm-10 d-flex align-items-center gap-5">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="statusAyah1"
                                                        name="status_ayah[]" value="Kandung">
                                                    <label class="form-check-label" for="statusAyah1">
                                                        Kandung
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="statusAyah2"
                                                        name="status_ayah[]" value="Tiri">
                                                    <label class="form-check-label" for="statusAyah2">
                                                        Tiri
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="statusAyah3"
                                                        name="status_ayah[]" value="Angkat">
                                                    <label class="form-check-label" for="statusAyah3">
                                                        Angkat
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Status Ibu</legend>
                                        <div class="col-sm-10 d-flex align-items-center gap-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="statusIbu1"
                                                    name="status_ibu[]" value="Kandung">
                                                <label class="form-check-label" for="statusIbu1">
                                                    Kandung
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="statusIbu2"
                                                    name="status_ibu[]" value="Tiri">
                                                <label class="form-check-label" for="statusIbu2">
                                                    Tiri
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="statusIbu3"
                                                    name="status_ibu[]" value="Angkat">
                                                <label class="form-check-label" for="statusIbu3">
                                                    Angkat
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tempatLahirA" class="form-label">Tempat/Tanggal Lahir Ayah <span
                                                class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-2">
                                                <input type="text" class="form-control" id="tempatLahirA"
                                                    name="tempat_lahir_ayah" value="{{ old('tempat_lahir_ayah', $registration->tempat_lahir_ayah ?? '')}}"
                                                    required placeholder="Masukan tempat lahir ayah">
                                            </div>
                                            <div class="col-12 col-md-6 mb-2">
                                                <input type="date" class="form-control" id="tanggalLahirA"
                                                    name="tanggal_lahir_ayah" value="{{ old('tanggal_lahir_ayah', $registration->tanggal_lahir_ayah ?? '')}}"
                                                    required>
                                            </div>
                                        </div>
                                        <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                    </div>
                                    <div class="mb-3">
                                        <label for="tempatLahirI" class="form-label">Tempat/Tanggal Lahir Ibu <span
                                                class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-2">
                                                <input type="text" class="form-control" id="tempatLahirI"
                                                    name="tempat_lahir_ibu" value="{{ old('tempat_lahir_ibu', $registration->tempat_lahir_ibu ?? '')}}" required
                                                    placeholder="Masukan tempat lahir ibu">
                                            </div>
                                            <div class="col-12 col-md-6 mb-2">
                                                <input type="date" class="form-control" id="tanggalLahirI"
                                                    name="tanggal_lahir_ibu" value="{{ old('tanggal_lahir_ibu', $registration->tabggal_lahir_ibu ?? '')}}" required>
                                            </div>
                                        </div>
                                        <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat Rumah<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="alamat" name="alamat_ortu"
                                            value="{{ old('alamat_ortu', $registration->alamat_ortu ?? '')}}"
                                            required placeholder="Contoh : Jl. Sudirman No. 00, Kota Padang">
                                        <span class="error-message"></span>
                                    </div>

                                    <div class="mb-3">
                                        <label for="kodePos" class="form-label">Kode Pos<span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="kodepos" name="kode_pos_ortu"
                                            value="{{ old('kode_pos_ortu', $registration->kode_pos_ortu ?? '')}}"
                                            required placeholder="Masukan kode pos anda">
                                        <span class="error-message"></span>
                                    </div>

                                    <div class="mb-3">
                                        <label for="notelp" class="form-label">Nomor Telepon<span
                                                class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" id="notelp" name="no_telp_ortu"
                                            value="{{ old('no_telp_ortu', $registration->no_telp_ortu ?? '')}}"
                                            required placeholder="Contoh : 6282123456789">
                                        <span class="error-message"></span>
                                    </div>

                                    <div class="mb-3">
                                        <p class="mb-1">Kantor/Tempat Kerja</p>
                                        <div class="mb-1 row">
                                            <label for="kantorAyah" class="col-sm-2 col-form-label">a. Ayah <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="kantorAyah"
                                                    name="kantor_ayah" value="{{ old('kantor_ayah', $registration->kantor_ayah ?? '')}}"
                                                    required placeholder="Jl. Sudirman, Kota Padang">
                                                <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="kantorIbu" class="col-sm-2 col-form-label">b. Ibu <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="kantorIbu"
                                                    name="kantor_ibu" value="{{ old('kantor_ibu', $registration->kantor_ibu ?? '')}}"
                                                    required placeholder="Jl. Sudirman, Kota Padang">
                                                <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <p class="mb-1">Yang dapat dihubungi dengan cepat jika terjadi sesuatu
                                            (Emergency) / No. HP
                                        </p>
                                        <div class="mb-1 row">
                                            <label for="nohpAyah" class="col-sm-2 col-form-label">a. Ayah <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="tel" class="form-control" id="nohpAyah"
                                                    name="no_hp_ayah" value="{{ old('no_hp_ayah', $registration->no_hp_ayah ?? '')}}"
                                                    required placeholder="Contoh : 6282123456789">
                                                <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nohpIbu" class="col-sm-2 col-form-label">b. Ibu <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="tel" class="form-control" id="nohpIbu"
                                                    name="no_hp_ibu" value="{{ old('no_hp_ibu', $registration->no_hp_ibu ?? '')}}"
                                                    required placeholder="Contoh : 6282123456789">
                                                <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                            </div>
                                        </div>
                                    </div>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Kawasan Tinggal<span
                                                class="text-danger">*</span>
                                        </legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kawasan_tinggal"
                                                    id="kawasanTinggal1" value="Perumahan/Komplek"
                                                    {{ old('kawasan_tinggal', $registration->kawasan_tinggal ?? '') == 'Perumahan/Komplek' ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="kawasanTinggal1">Perumahan/Komplek</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kawasan_tinggal"
                                                    id="kawasanTinggal2" value="Ruko"
                                                    {{ old('kawasan_tinggal', $registration->kawasan_tinggal ?? '') == 'Ruko' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="kawasanTinggal2">Ruko</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kawasan_tinggal"
                                                    id="kawasanTinggal3" value="Perkampungan"
                                                    {{ old('kawasan_tinggal', $registration->kawasan_tinggal ?? '') == 'Perkampungan' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="kawasanTinggal3">Perkampungan</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Status Tempat Tinggal<span
                                                class="text-danger">*</span></legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="status_tempat_tinggal" id="statusTempatTinggal1"
                                                    value="Milik Pribadi"
                                                    {{ old('status_tempat_tinggal', $registration->status_tempat_tinggal ?? '') == 'Milik Pribadi' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="statusTempatTinggal1">Milik
                                                    Pribadi</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="status_tempat_tinggal" id="statusTempatTinggal2"
                                                    value="Sewa"
                                                    {{ old('status_tempat_tinggal', $registration->status_tempat_tinggal ?? '') == 'Sewa' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="statusTempatTinggal2">Sewa</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="status_tempat_tinggal" id="statusTempatTinggal3"
                                                    value="Tumpangan"
                                                    {{ old('status_tempat_tinggal', $registration->status_tempat_tinggal ?? '') == 'Tumpangan' ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="statusTempatTinggal3">Tumpangan</label>
                                            </div>
                                        </div>
                                    </fieldset>


                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-3" style="padding-top: 2rem">
                                        <legend class="col-form-label col-sm-2 pt-0">Pendidikan Ayah</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ayah"
                                                    id="pendidikanAyah1" value="SD"
                                                    {{ old('pendidikan_ayah', $registration->pendidikan_ayah ?? '') == 'SD' ? 'checked' : '' }}
                                                    onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanAyah1">SD</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ayah"
                                                    id="pendidikanAyah2" value="SMP"
                                                    {{ old('pendidikan_ayah', $registration->pendidikan_ayah ?? '') == 'SMP' ? 'checked' : '' }}
                                                    onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanAyah2">SMP</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ayah"
                                                    id="pendidikanAyah3" value="SMA"
                                                    {{ old('pendidikan_ayah', $registration->pendidikan_ayah ?? '') == 'SMA' ? 'checked' : '' }}
                                                    onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanAyah3">SMA</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ayah"
                                                    id="pendidikanAyah4" value="DIII"
                                                    {{ old('pendidikan_ayah', $registration->pendidikan_ayah ?? '') == 'DIII' ? 'checked' : '' }}
                                                    onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanAyah4">DIII</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ayah"
                                                    id="pendidikanAyah5" value="S1"
                                                    {{ old('pendidikan_ayah', $registration->pendidikan_ayah ?? '') == 'S1' ? 'checked' : '' }}
                                                    onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanAyah5">S1</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ayah"
                                                    id="pendidikanAyah6" value="S2"
                                                    {{ old('pendidikan_ayah', $registration->pendidikan_ayah ?? '') == 'S2' ? 'checked' : '' }}
                                                    onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanAyah6">S2</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ayah"
                                                    id="pendidikanAyah7" value="Lain-lain"
                                                    {{ old('pendidikan_ayah', $registration->pendidikan_ayah ?? '') == 'Lain-lain' ? 'checked' : '' }}
                                                    onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanAyah7">Lain-lain,
                                                    sebutkan...</label>
                                            </div>
                                            <input type="text" class="form-control mt-2"
                                                id="inputLainpendidikan_ayah_lain" name="pendidikan_ayah_lain"
                                                value="{{ old('pendidikan_ayah_lain', $registration->pendidikan_ayah_lain??'')}}"
                                                placeholder="Sebutkan..." style="display:none;">
                                        </div>
                                    </div>

                                    <div class="row mb-3" style="padding-top: 2rem">
                                        <legend class="col-form-label col-sm-2 pt-0">Pendidikan Ibu</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ibu"
                                                    id="pendidikanIbu1" value="SD"
                                                    {{ old('pendidikan_ibu', $registration->pendidikan_ibu ?? '') == 'SD' ? 'checked' : '' }}
                                                    onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanIbu1">SD</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ibu"
                                                    id="pendidikanIbu2" value="SMP"
                                                    {{ old('pendidikan_ibu', $registration->pendidikan_ibu ?? '') == 'SMP' ? 'checked' : '' }}
                                                    onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanIbu2">SMP</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ibu"
                                                    id="pendidikanIbu3" value="SMA"
                                                    {{ old('pendidikan_ibu', $registration->pendidikan_ibu ?? '') == 'SMA' ? 'checked' : '' }}
                                                    onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanIbu3">SMA</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ibu"
                                                    id="pendidikanIbu4" value="DIII"
                                                    {{ old('pendidikan_ibu', $registration->pendidikan_ibu ?? '') == 'DIII' ? 'checked' : '' }}
                                                    onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanIbu4">DIII</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ibu"
                                                    id="pendidikanIbu5" value="S1"
                                                    {{ old('pendidikan_ibu', $registration->pendidikan_ibu ?? '') == 'S1' ? 'checked' : '' }}
                                                    onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanIbu5">S1</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ibu"
                                                    id="pendidikanIbu6" value="S2"
                                                    {{ old('pendidikan_ibu', $registration->pendidikan_ibu ?? '') == 'S2' ? 'checked' : '' }}
                                                    onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanIbu6">S2</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ibu"
                                                    id="pendidikanIbu7" value="Lain-lain"
                                                    {{ old('pendidikan_ibu', $registration->pendidikan_ibu ?? '') == 'Lain-lain' ? 'checked' : '' }}
                                                    onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanIbu7">Lain-lain,
                                                    sebutkan...</label>
                                            </div>
                                            <input type="text" class="form-control mt-2" id="inputLainPendidikanIbu"
                                                name="pendidikan_ibu_lain" value="{{ old('pendidikan_ibu_lain', $registration->pendidikan_ibu_lain ?? '') }}"
                                                placeholder="Sebutkan..."
                                                style="display:none;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <p class="mb-1">Pekerjaan Ayah Sebagai <span class="text-danger">*</span>
                                        </p>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example"
                                                id="jobSelectAyah" name="pekerjaan_ayah"
                                                onchange="updatePlaceholderAyah()">
                                                <option selected>Klik untuk memilih</option>
                                                <option value="PNS">Pegawai Negeri, dengan Golongan</option>
                                                <option value="Swasta">Pegawai Swasta, dengan Jabatan</option>
                                                <option value="Pengusaha">Pengusaha, dengan Bidang Usaha</option>
                                                <option value="Wiraswasta">Wiraswasta, dengan Bidang Usaha</option>
                                                <option value="Militer">Militer, dengan Pangkat</option>
                                                <option value="Polisi">Polisi, dengan Pangkat</option>
                                                <option value="Buruh">Buruh, Petani, Nelayan</option>
                                                <option value="Other">Lain-Lain, sebutkan</option>
                                            </select>
                                            <input type="text" class="form-control mt-2" id="detailInputAyah"
                                                name="pekerjaan_ayah_detail" value="{{ old('pekerjaan_ayah_detail', $registration->pekerjaan_ayah_detail ?? '')}}"
                                                placeholder="Masukan detail golongan"
                                                style="display: none;">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <p class="mb-1">Pekerjaan Ibu Sebagai <span class="text-danger">*</span></p>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example"
                                                id="jobSelectIbu" name="pekerjaan_ibu" onchange="updatePlaceholderIbu()">
                                                <option selected>Klik untuk memilih</option>
                                                <option value="PNS">Pegawai Negeri, dengan Golongan</option>
                                                <option value="Swasta">Pegawai Swasta, dengan Jabatan</option>
                                                <option value="Pengusaha">Pengusaha, dengan Bidang Usaha</option>
                                                <option value="Wiraswasta">Wiraswasta, dengan Bidang Usaha</option>
                                                <option value="Militer">Militer, dengan Pangkat</option>
                                                <option value="Polisi">Polisi, dengan Pangkat</option>
                                                <option value="Buruh">Buruh, Petani, Nelayan</option>
                                                <option value="Other">Lain-Lain, sebutkan</option>
                                            </select>
                                            <input type="text" class="form-control mt-2" id="detailInputIbu"
                                                name="pekerjaan_ibu_detail" value="{{ old('pekerjaan_ibu_detail', $registration->pekerjaan_ibu_detail ?? '')}}"
                                                placeholder="Masukan detail golongan"
                                                style="display: none;">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <p class="mb-1">Penghasilan Sebulan yang diperoleh Ayah<span
                                                class="text-danger">*</span>
                                        </p>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example"
                                                id="penghasilan" name="penghasilan_ayah">
                                                <option selected>Klik untuk memilih</option>
                                                <option value="<2jt">Kurang dari Rp.2.000.000</option>
                                                <option value="5-10jt">Rp.5.000.000 s/d Rp.10.000.000</option>
                                                <option value=">10jt">Lebih dari Rp.10.000.000</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <p class="mb-1">Penghasilan Sebulan yang diperoleh Ibu<span
                                                class="text-danger">*</span></p>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example"
                                                id="penghasilanIbu" name="penghasilan_ibu">
                                                <option value="<2jt">Kurang dari Rp.2.000.000</option>
                                                <option value="5-10jt">Rp.5.000.000 s/d Rp.10.000.000</option>
                                                <option value=">10jt">Lebih dari Rp.10.000.000</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Additional fields for Data Orang Tua go here -->

                                    <div class="row mb-3">
                                        <label for="nohpIbu" class="col-sm-12 col-form-label">Jumlah Tanggungan<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" id="jumlahTanggungan"
                                                name="jumlah_tanggungan" value="{{ old('jumlah_tanggungan', $registration->jumlah_tanggungan ?? '')}}">
                                            <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                        </div>
                                    </div>

                                    <!-- Tanggungan Data Section -->
                                    <div class="mb-3">
                                        <label for="dataTanggungan" class="form-label">Nama anak yang menjadi
                                            tanggungan<span class="text-danger"> : *</span></label>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#tambahTanggungan">Tambahkan data tanggungan</button>
                                    </div>

                                    <!-- Hidden inputs for tanggungan data -->
                                    <div id="hiddenInputsContainer">
                                        <input type="hidden" name="tanggungan[0][namaLengkap]" value="John Doe">
                                        <input type="hidden" name="tanggungan[0][sekolah]" value="School ABC">
                                        <input type="hidden" name="tanggungan[0][kelas]" value="5th Grade">
                                        <input type="hidden" name="tanggungan[0][uangSekolah]" value="2000000">
                                        <input type="hidden" name="tanggungan[0][keterangan]" value="Sibling">

                                    </div>

                                    <!-- Table for Displaying Tanggungan Data -->
                                    <table class="table table-striped table-bordered text-center mt-4">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Sekolah/Kampus</th>
                                                <th scope="col">Kelas/Semester</th>
                                                <th scope="col">Uang Sekolah</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tanggunganTableBody">
                                            <!-- Tanggungan data will be added here dynamically -->
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                </div>
                <a href="{{ route('step1.show', ['user_id' => $user_id]) }}" class="btn btn-secondary mt-3">Back</a>
                <!-- Submission Button -->
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>


                <!-- Modal for Adding Tanggungan -->
                <div class="modal fade" id="tambahTanggungan" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambahkan Data Tanggungan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form id="tanggunganForm">
                                    <div class="mb-3">
                                        <label for="namaLengkapTg" class="form-label">Nama Lengkap Tanggungan</label>
                                        <input type="text" class="form-control" id="namaLengkapTg" name="nama_lengkap_tanggungan"
                                        value="{{ old('nama_lengkap_tanggungan', $registration->nama_lengkap_tanggungan ?? '')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="sekolahTg" class="form-label">Sekolah/Kampus</label>
                                        <input type="text" class="form-control" id="sekolahTg" name="sekolah_tanggungan"
                                        value="{{ old('sekolah_tanggungan', $registration->sekolah_tanggungan ?? '')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kelasTg" class="form-label">Kelas/Semester</label>
                                        <input type="text" class="form-control" id="kelasTg" name="kelas_tanggungan"
                                        value="{{ old('kelas_tanggungan', $registration->kelas_tanggungan ?? '')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="uangSekolahTg" class="form-label">Uang Sekolah</label>
                                        <input type="text" class="form-control" id="uangSekolahTg" name="uang_sekolah_tanggungan"
                                        value="{{ old('uang_sekolah_tanggungan', $registration->uang_sekolah_tanggungan ?? '')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="keteranganTg" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keteranganTg" name="keterangan_tanggungan"
                                        value="{{ old('keterangan_tanggungan', $registration->keterangan_tanggungan ?? '') }}">
                                    </div>
                                    <button type="button" class="btn btn-primary" id="saveTanggungan">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>

    <!-- JavaScript for step navigation -->


    <script>
        document.getElementById('confirmSubmit').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent form submission initially
            updateHiddenInputs(); // Make sure hidden inputs are updated
            document.querySelector('form').submit(); // Submit the form after updating hidden inputs
        });
    </script>



    <script>
        function toggleInputPendidikan() {
            const pendidikanAyah = document.querySelector('input[name="pendidikan_ayah"]:checked');
            const pendidikanIbu = document.querySelector('input[name="pendidikan_ibu"]:checked');

            const inputLainPendidikanAyah = document.getElementById('inputLainpendidikan_ayah_lain');
            const inputLainPendidikanIbu = document.getElementById('inputLainPendidikanIbu');

            // Menampilkan atau menyembunyikan input berdasarkan status radio button
            inputLainPendidikanAyah.style.display = pendidikanAyah && pendidikanAyah.value === 'Lain-lain' ? 'block' :
                'none';
            inputLainPendidikanIbu.style.display = pendidikanIbu && pendidikanIbu.value === 'Lain-lain' ? 'block' : 'none';
        }

        function toggleInputRekreasi() {
            const lainCheckbox = document.getElementById('rekreasi5');
            const inputLainRekreasi = document.getElementById('inputLainRekreasi');

            inputLainRekreasi.style.display = lainCheckbox.checked ? 'block' : 'none';
        }

        function updatePlaceholderAyah() {
            const select = document.getElementById('jobSelectAyah');
            const input = document.getElementById('detailInputAyah');

            // Ambil nilai yang dipilih
            const selectedValue = select.value;

            // Ubah placeholder dan tampilkan input berdasarkan pilihan
            if (selectedValue === "PNS") {
                input.placeholder = "Masukan detail golongan";
                input.style.display = "block"; // Tampilkan input
            } else if (selectedValue === "Swasta") {
                input.placeholder = "Masukan jabatan Ayah";
                input.style.display = "block"; // Tampilkan input
            } else if (selectedValue === "Pengusaha") {
                input.placeholder = "Masukan bidang usaha Ayah";
                input.style.display = "block"; // Tampilkan input
            } else if (selectedValue === "Wiraswasta") {
                input.placeholder = "Masukan bidang usaha Ayah";
                input.style.display = "block"; // Tampilkan input
            } else if (selectedValue === "Militer") {
                input.placeholder = "Masukan pangkat Ayah";
                input.style.display = "block"; // Tampilkan input
            } else if (selectedValue === "Polisi") {
                input.placeholder = "Masukan pangkat Ayah";
                input.style.display = "block"; // Tampilkan input
            } else if (selectedValue === "Other") {
                input.placeholder = "Masukan pekerjaan Ayah";
                input.style.display = "block"; // Tampilkan input
            } else {
                input.placeholder = ""; // Kosongkan placeholder
                input.style.display = "none"; // Sembunyikan input
            }
        }

        function updatePlaceholderIbu() {
            const select = document.getElementById('jobSelectIbu');
            const input = document.getElementById('detailInputIbu');

            // Ambil nilai yang dipilih
            const selectedValue = select.value;

            // Ubah placeholder dan tampilkan input berdasarkan pilihan
            if (selectedValue === "PNS") {
                input.placeholder = "Masukan detail golongan";
                input.style.display = "block"; // Tampilkan input
            } else if (selectedValue === "Swasta") {
                input.placeholder = "Masukan jabatan Ibu";
                input.style.display = "block"; // Tampilkan input
            } else if (selectedValue === "Pengusaha") {
                input.placeholder = "Masukan bidang usaha Ibu";
                input.style.display = "block"; // Tampilkan input
            } else if (selectedValue === "Wiraswasta") {
                input.placeholder = "Masukan bidang usaha Ibu";
                input.style.display = "block"; // Tampilkan input
            } else if (selectedValue === "Militer") {
                input.placeholder = "Masukan pangkat Ibu";
                input.style.display = "block"; // Tampilkan input
            } else if (selectedValue === "Polisi") {
                input.placeholder = "Masukan pangkat Ibu";
                input.style.display = "block"; // Tampilkan input
            } else if (selectedValue === "Other") {
                input.placeholder = "Masukan pekerjaan Ibu";
                input.style.display = "block"; // Tampilkan input
            } else {
                input.placeholder = ""; // Kosongkan placeholder
                input.style.display = "none"; // Sembunyikan input
            }
        }
    </script>


    <script>
        // Ambil elemen checkbox dan input teks
        const lainLainCheckbox = document.getElementById('lainLain');
        const inputLainLain = document.getElementById('inputLainLain');

        // Tambahkan event listener pada checkbox 'Lain-lain'
        lainLainCheckbox.addEventListener('change', function() {
            if (this.checked) {
                inputLainLain.style.display = 'block'; // Tampilkan input teks jika dipilih
            } else {
                inputLainLain.style.display = 'none'; // Sembunyikan input teks jika tidak dipilih
            }
        });
    </script>
    <!-- Script untuk menampilkan input text jika suku lain-lain dipilih -->
    <script>
        const lainLainSukuRadio = document.getElementById('lainLainSuku');
        const inputLainLainSuku = document.getElementById('inputLainLainSuku');

        const sukuRadios = document.querySelectorAll('input[name="suku"]');

        sukuRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (lainLainSukuRadio.checked) {
                    inputLainLainSuku.style.display =
                        'block'; // Tampilkan input teks jika 'Lain-lain' dipilih
                } else {
                    inputLainLainSuku.style.display =
                        'none'; // Sembunyikan input teks jika 'Lain-lain' tidak dipilih
                }
            });
        });
    </script>
    <!-- Script untuk menampilkan input text jika 'Lain-lain' dipilih -->
    <script>
        const lainLainKewarganegaraanRadio = document.getElementById('lainLainKewarganegaraan');
        const indonesiaRadio = document.getElementById('indonesia');
        const inputLainLainKewarganegaraan = document.getElementById('inputLainLainKewarganegaraan');

        // Event listener untuk radio button kewarganegaraan
        lainLainKewarganegaraanRadio.addEventListener('change', function() {
            if (this.checked) {
                inputLainLainKewarganegaraan.style.display =
                    'block'; // Tampilkan input teks jika 'Lain-lain' dipilih
            }
        });

        indonesiaRadio.addEventListener('change', function() {
            if (this.checked) {
                inputLainLainKewarganegaraan.style.display =
                    'none'; // Sembunyikan input teks jika 'Indonesia' dipilih
            }
        });
    </script>
    <!-- Script untuk menampilkan input text jika 'Lain-lain' dipilih -->
    <script>
        const lainLainAgamaRadio = document.getElementById('lainLainAgama');
        const inputLainLainAgama = document.getElementById('inputLainLainAgama');

        const agamaRadios = document.querySelectorAll('input[name="agama"]');

        agamaRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (lainLainAgamaRadio.checked) {
                    inputLainLainAgama.style.display =
                        'block'; // Tampilkan input teks jika 'Lain-lain' dipilih
                } else {
                    inputLainLainAgama.style.display =
                        'none'; // Sembunyikan input teks jika 'Lain-lain' tidak dipilih
                }
            });
        });
    </script>


    <!--step 2 -->
    <script>
        const uangSekolahInput = document.getElementById('uangSekolahTg');

        uangSekolahInput.addEventListener('input', function(e) {
            let value = this.value.replace(/\D/g, '');
            let formattedValue = new Intl.NumberFormat('id-ID').format(value);
            this.value = 'Rp. ' + formattedValue;
        });
    </script>

    <script>
        let tanggunganData = [];

        // Save tanggungan data and update the table and hidden inputs
        document.getElementById('saveTanggungan').addEventListener('click', function() {
            // Extract values
            const namaLengkap = document.getElementById('namaLengkapTg').value;
            const sekolah = document.getElementById('sekolahTg').value;
            const kelas = document.getElementById('kelasTg').value;
            const uangSekolah = document.getElementById('uangSekolahTg').value.replace(/\D/g,
                ''); // Remove non-numeric
            const keterangan = document.getElementById('keteranganTg').value;

            // Validate input fields
            if (!namaLengkap || !sekolah || !kelas || !uangSekolah) {
                alert('Please fill in all required fields for tanggungan.');
                return;
            }

            // Add new entry to the array
            tanggunganData.push({
                namaLengkap,
                sekolah,
                kelas,
                uangSekolah,
                keterangan
            });

            // Update table and hidden inputs
            updateTable();
            updateHiddenInputs();

            // Reset form fields and close modal
            document.getElementById('tanggunganForm').reset();
            bootstrap.Modal.getInstance(document.getElementById('tambahTanggungan')).hide();
        });

        // Function to update the tanggungan table
        function updateTable() {
            const tableBody = document.getElementById('tanggunganTableBody');
            tableBody.innerHTML = ''; // Clear existing rows

            tanggunganData.forEach((tanggungan, index) => {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
            <td>${index + 1}</td>
            <td>${tanggungan.namaLengkap}</td>
            <td>${tanggungan.sekolah}</td>
            <td>${tanggungan.kelas}</td>
            <td>Rp. ${new Intl.NumberFormat('id-ID').format(tanggungan.uangSekolah)}</td>
            <td>${tanggungan.keterangan}</td>
            <td><button class="btn btn-danger btn-sm" onclick="deleteRow(${index})">Delete</button></td>
        `;
                tableBody.appendChild(newRow);
            });
        }

        // Function to delete a row and update the array
        function deleteRow(index) {
            tanggunganData.splice(index, 1); // Remove the selected entry
            updateTable(); // Re-render the table
            updateHiddenInputs(); // Refresh hidden inputs
        }

        // Function to create hidden inputs for form submission
        function updateHiddenInputs() {
            const container = document.getElementById('hiddenInputsContainer');
            container.innerHTML = ''; // Clear previous hidden inputs

            tanggunganData.forEach((tanggungan, index) => {
                container.insertAdjacentHTML('beforeend', `
            <input type="hidden" name="nama_lengkap_tanggungan[]" value="${tanggungan.namaLengkap}">
            <input type="hidden" name="sekolah_tanggungan[]" value="${tanggungan.sekolah}">
            <input type="hidden" name="kelas_tanggungan[]" value="${tanggungan.kelas}">
            <input type="hidden" name="uang_sekolah_tanggungan[]" value="${tanggungan.uangSekolah}">
            <input type="hidden" name="keterangan_tanggungan[]" value="${tanggungan.keterangan}">
        `);
            });
        }
    </script>
@endsection
