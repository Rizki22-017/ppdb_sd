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
    </div><!-- End Page Title -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <div class="container">

            <div class="d-flex justify-content-center">

                <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

                    <li class="nav-item">
                        <a class="nav-link active show" href="#" aria-disabled="true">
                            <h4>Step 1 : Data Siswa</h4>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" aria-disabled="true">
                            <h4>Step 2 : Data Orang Tua</h4>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" aria-disabled="true">
                            <h4>Step 3 : Data Wali</h4>
                        </a>
                    </li>

                </ul>

            </div>

             <div class="tab-content" data-aos="fade-up" data-aos-delay="200">


                <form action="{{route('step2.post',$register_id)}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Data Orang Tua</h5>
                                    <div class="mb-3">
                                        <label for="namaLengkapAyah" class="form-label">Nama Lengkap Ayah <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="namaLengkapAyah" name="nama_lengkap_ayah" required
                                            placeholder="Masukan nama lengkap ayah">
                                        <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                    </div>
                                    <div class="mb-3">
                                        <label for="nikAyah" class="form-label">NIK Ayah<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nikAyah" name="nik_ayah" required
                                            placeholder="Masukan NIK ayah" maxlength="16" pattern="\d{16}" title="NIK harus 16 digit angka">
                                        <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                    </div>
                                    <div class="mb-3">
                                        <label for="namaLengkapIbu" class="form-label">Nama Lengkap Ibu <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="namaLengkapIbu" name="nama_lengkap_ibu" required
                                            placeholder="Masukan nama lengkap ayah">
                                        <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                    </div>
                                    <div class="mb-3">
                                        <label for="nikAyah" class="form-label">NIK Ibu<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nikIbu" name="nik_ibu" required
                                            placeholder="Masukan NIK ayah" maxlength="16" pattern="\d{16}" title="NIK harus 16 digit angka">
                                        <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                    </div>
                                    <div class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Status Ayah</legend>
                                        <div class="col-sm-10 d-flex align-items-center gap-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="statusAyah1" name="status_ayah[]">
                                                <label class="form-check-label" for="statusAyah1">
                                                    Kandung
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="statusAyah2" name="status_ayah[]">
                                                <label class="form-check-label" for="statusAyah2">
                                                    Tiri
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="statusAyah3" name="status_ayah[]">
                                                <label class="form-check-label" for="statusAyah3">
                                                    Angkat
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Status Ibu</legend>
                                        <div class="col-sm-10 d-flex align-items-center gap-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="statusIbu1" name="status_ibu[]">
                                                <label class="form-check-label" for="statusIbu1">
                                                    Kandung
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="statusIbu2" name="status_ibu[]">
                                                <label class="form-check-label" for="statusIbu2">
                                                    Tiri
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="statusIbu3" name="status_ibu[]">
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
                                                <input type="text" class="form-control" id="tempatLahirA" name="tempat_lahir_ayah"
                                                    required placeholder="Masukan tempat lahir ayah">
                                            </div>
                                            <div class="col-12 col-md-6 mb-2">
                                                <input type="date" class="form-control" id="tanggalLahirA" name="tanggal_lahir_ayah"
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
                                                <input type="text" class="form-control" id="tempatLahirI" name="tempat_lahir_ibu"
                                                    required placeholder="Masukan tempat lahir ibu">
                                            </div>
                                            <div class="col-12 col-md-6 mb-2">
                                                <input type="date" class="form-control" id="tanggalLahirI" name="tanggal_lahir_ibu"
                                                    required>
                                            </div>
                                        </div>
                                        <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat Rumah<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="alamat" name="alamat_ortu" required
                                            placeholder="Contoh : Jl. Sudirman No. 00, Kota Padang">
                                        <span class="error-message"></span>
                                    </div>

                                    <div class="mb-3">
                                        <label for="kodePos" class="form-label">Kode Pos<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="kodepos" name="kode_pos_ortu" required
                                            placeholder="Masukan kode pos anda">
                                        <span class="error-message"></span>
                                    </div>

                                    <div class="mb-3">
                                        <label for="notelp" class="form-label">Nomor Telepon<span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" id="notelp" name="no_telp_ortu" required
                                            placeholder="Contoh : 6282123456789">
                                        <span class="error-message"></span>
                                    </div>

                                    <div class="mb-3">
                                        <p class="mb-1">Kantor/Tempat Kerja</p>
                                        <div class="mb-1 row">
                                            <label for="kantorAyah" class="col-sm-2 col-form-label">a. Ayah <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="tel" class="form-control" id="kantorAyah" name="kantor_ayah" required
                                                    placeholder="Jl. Sudirman, Kota Padang">
                                                <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="kantorIbu" class="col-sm-2 col-form-label">b. Ibu <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="tel" class="form-control" id="kantorIbu" name="kantor_ibu" required
                                                    placeholder="Jl. Sudirman, Kota Padang">
                                                <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <p class="mb-1">Yang dapat dihubungi dengan cepat jika terjadi sesuatu (Emergency) / No. HP
                                        </p>
                                        <div class="mb-1 row">
                                            <label for="nohpAyah" class="col-sm-2 col-form-label">a. Ayah <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="tel" class="form-control" id="nohpAyah" name="no_hp_ayah" required
                                                    placeholder="Contoh : 6282123456789">
                                                <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nohpIbu" class="col-sm-2 col-form-label">b. Ibu <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="tel" class="form-control" id="nohpIbu" name="no_hp_ibu" required
                                                    placeholder="Contoh : 6282123456789">
                                                <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                            </div>
                                        </div>
                                    </div>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Kawasan Tinggal<span class="text-danger">*</span>
                                        </legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kawasan_tinggal"
                                                    id="kawasanTinggal1" value="Perumahan/Komplek">
                                                <label class="form-check-label" for="kawasanTinggal1">Perumahan/Komplek</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kawasan_tinggal"
                                                    id="kawasanTinggal2" value="Ruko">
                                                <label class="form-check-label" for="kawasanTinggal2">Ruko</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kawasan_tinggal"
                                                    id="kawasanTinggal3" value="Perkampungan">
                                                <label class="form-check-label" for="kawasanTinggal3">Perkampungan</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Status Tempat Tinggal<span
                                                class="text-danger">*</span></legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status_tempat_tinggal"
                                                    id="statusTempatTinggal1" value="Milik Pribadi">
                                                <label class="form-check-label" for="statusTempatTinggal1">Milik Pribadi</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status_tempat_tinggal"
                                                    id="statusTempatTinggal2" value="Sewa">
                                                <label class="form-check-label" for="statusTempatTinggal2">Sewa</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status_tempat_tinggal"
                                                    id="statusTempatTinggal3" value="Tumpangan">
                                                <label class="form-check-label" for="statusTempatTinggal3">Tumpangan</label>
                                            </div>
                                        </div>
                                    </fieldset>


                                    <!-- <div class="row mb-3">
                                        <div class="mb-3" id="inputLain" style="display: none;">
                                            <input type="text" class="form-control" id="inputLainDetail" name="inputLainDetail"
                                                placeholder="Masukan jawaban anda">
                                            <span class="error-message"></span>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <!--Halaman kedua-->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-3" style="padding-top: 2rem">
                                        <legend class="col-form-label col-sm-2 pt-0">Pendidikan Ayah</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ayah"
                                                    id="pendidikanAyah1" value="SD" onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanAyah1">SD</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ayah"
                                                    id="pendidikanAyah2" value="SMP" onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanAyah2">SMP</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ayah"
                                                    id="pendidikanAyah3" value="SMA" onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanAyah3">SMA</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ayah"
                                                    id="pendidikanAyah4" value="SMA" onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanAyah4">DIII</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ayah"
                                                    id="pendidikanAyah5" value="SMA" onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanAyah5">S1</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ayah"
                                                    id="pendidikanAyah6" value="SMA" onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanAyah6">S2</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ayah"
                                                    id="pendidikanAyah7" value="Lain-lain" onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanAyah7">Lain-lain, sebutkan...</label>
                                            </div>
                                            <input type="text" class="form-control mt-2" id="inputLainpendidikan_ayah_lain"
                                                name="pendidikan_ayah_lain" placeholder="Sebutkan..." style="display:none;">
                                        </div>
                                    </div>

                                    <div class="row mb-3" style="padding-top: 2rem">
                                        <legend class="col-form-label col-sm-2 pt-0">Pendidikan Ibu</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ibu" id="pendidikanIbu1"
                                                    value="SD" onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanIbu1">SD</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ibu" id="pendidikanIbu2"
                                                    value="SMP" onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanIbu2">SMP</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ibu" id="pendidikanIbu3"
                                                    value="SMA" onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanIbu3">SMA</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ibu" id="pendidikanIbu4"
                                                    value="SMA" onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanIbu4">DIII</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ibu" id="pendidikanIbu5"
                                                    value="SMA" onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanIbu5">S1</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ibu" id="pendidikanIbu6"
                                                    value="SMA" onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanIbu6">S2</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan_ibu" id="pendidikanIbu7"
                                                    value="Lain-lain" onclick="toggleInputPendidikan()">
                                                <label class="form-check-label" for="pendidikanIbu7">Lain-lain, sebutkan...</label>
                                            </div>
                                            <input type="text" class="form-control mt-2" id="inputLainPendidikanIbu"
                                                name="pendidikan_ibu_lain" placeholder="Sebutkan..." style="display:none;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <p class="mb-1">Pekerjaan Ayah Sebagai <span class="text-danger">*</span></p>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="jobSelectAyah"
                                                name="pekerjaan_ayah" onchange="updatePlaceholderAyah()">
                                                <option selected>Klik untuk memilih</option>
                                                <option value="1">Pegawai Negeri, dengan Golongan</option>
                                                <option value="2">Pegawai Swasta, dengan Jabatan</option>
                                                <option value="3">Pengusaha, dengan Bidang Usaha</option>
                                                <option value="4">Wiraswasta, dengan Bidang Usaha</option>
                                                <option value="5">Militer, dengan Pangkat</option>
                                                <option value="6">Polisi, dengan Pangkat</option>
                                                <option value="7">Buruh, Petani, Nelayan</option>
                                                <option value="8">Lain-Lain, sebutkan</option>
                                            </select>
                                            <input type="text" class="form-control mt-2" id="detailInputAyah"
                                                name="pekerjaan_ayah_detail" placeholder="Masukan detail golongan"
                                                style="display: none;">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <p class="mb-1">Pekerjaan Ibu Sebagai <span class="text-danger">*</span></p>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="jobSelectIbu"
                                                name="pekerjaan_ibu" onchange="updatePlaceholderIbu()">
                                                <option selected>Klik untuk memilih</option>
                                                <option value="1">Pegawai Negeri, dengan Golongan</option>
                                                <option value="2">Pegawai Swasta, dengan Jabatan</option>
                                                <option value="3">Pengusaha, dengan Bidang Usaha</option>
                                                <option value="4">Wiraswasta, dengan Bidang Usaha</option>
                                                <option value="5">Militer, dengan Pangkat</option>
                                                <option value="6">Polisi, dengan Pangkat</option>
                                                <option value="7">Buruh, Petani, Nelayan</option>
                                                <option value="8">Lain-Lain, sebutkan</option>
                                            </select>
                                            <input type="text" class="form-control mt-2" id="detailInputIbu"
                                                name="pekerjaan_ibu_detail" placeholder="Masukan detail golongan" style="display: none;">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <p class="mb-1">Penghasilan Sebulan yang diperoleh Ayah<span class="text-danger">*</span>
                                        </p>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="penghasilan"
                                                name="penghasilan_ayah">
                                                <option selected>Klik untuk memilih</option>
                                                <option value="1">Kurang dari Rp.2.000.000</option>
                                                <option value="2">Rp.5.000.000 s/d Rp.10.000.000</option>
                                                <option value="3">Lebih dari Rp.10.000.000</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <p class="mb-1">Penghasilan Sebulan yang diperoleh Ibu<span class="text-danger">*</span></p>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" id="penghasilanIbu"
                                                name="penghasilan_ibu">
                                                <option selected>Klik untuk memilih</option>
                                                <option value="1">Kurang dari Rp.2.000.000</option>
                                                <option value="2">Rp.5.000.000 s/d Rp.10.000.000</option>
                                                <option value="3">Lebih dari Rp.10.000.000</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="jumlahtanggungan" class="form-label">Jumlah anak yang menjadi tanggungan <span
                                                class="text-danger">*</span></label>
                                        <div style="display: flex; align-items: center;">
                                            <input type="number" class="form-control" id="jumlahtanggungan" name="jumlah_tanggungan"
                                                required placeholder="Masukkan jumlah tanggungan"
                                                style="flex-grow: 1; margin-right: 10px;">
                                            <span>Orang</span>
                                        </div>
                                        <span class="error-message"></span>
                                    </div>

                                    <div class="mb-3">
                                        <label for="dataTanggungan" class="form-label">Nama anak yang menjadi tanggungan<span
                                                class="text-danger">*</span></label>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning" style="display: flex; align-items: center"
                                            data-bs-toggle="modal" data-bs-target="#tambahTanggungan">
                                            Tambahkan data tanggungan
                                        </button>

                                        <!-- Modal -->
                                        <!-- Modal for adding 'Tanggungan' -->
                                        <div id="tanggunganContainer">
                                            <div class="modal fade" id="tambahTanggungan" data-bs-backdrop="static" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan data tanggungan
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="tanggunganForm">
                                                                <div class="mb-3 mt-3">
                                                                    <label for="namaLengkapTg" class="form-label">Nama Lengkap
                                                                        Tanggungan<span class="text-danger"></span></label>
                                                                    <input type="text" class="form-control" id="namaLengkapTg"
                                                                        name="tanggungan[0][nama_lengkap_tanggungan]"
                                                                        placeholder="Masukkan nama lengkap tanggungan">
                                                                </div>
                                                                <div class="mb-3 mt-3">
                                                                    <label for="sekolahTg" class="form-label">Sekolah/Kampus<span
                                                                            class="text-danger"></span></label>
                                                                    <input type="text" class="form-control" id="sekolahTg"
                                                                        name="tanggungan[0][sekolah_tanggungan]"
                                                                        placeholder="Masukkan nama sekolah/kampus">
                                                                </div>
                                                                <div class="mb-3 mt-3">
                                                                    <label for="kelasTg" class="form-label">Kelas/Semester<span
                                                                            class="text-danger"></span></label>
                                                                    <input type="text" class="form-control" id="kelasTg"
                                                                        name="tanggungan[0][kelas_tanggungan]"
                                                                        placeholder="Masukkan kelas/semester">
                                                                </div>
                                                                <div class="mb-3 mt-3">
                                                                    <label for="uangSekolahTg" class="form-label">Uang Sekolah<span
                                                                            class="text-danger"></span></label>
                                                                    <input type="text" class="form-control" id="uangSekolahTg"
                                                                        name="tanggungan[0][uang_sekolah_tanggungan]"
                                                                        placeholder="Masukan nominal uang sekolah">
                                                                </div>
                                                                <div class="mb-3 mt-3">
                                                                    <label for="keteranganTg" class="form-label">Keterangan</label>
                                                                    <input type="text" class="form-control" id="keteranganTg"
                                                                        name="tanggungan[0][keterangan_tanggungan]"
                                                                        placeholder="Berikan keterangan jika mendapat beasiswa">
                                                                </div>
                                                                <button type="button" class="btn btn-primary" id="saveTanggungan">Simpan
                                                                    perubahan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="error-message"></span>
                                    </div>

                                    <table class="table table-striped table-bordered text-center">
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
                                            <!-- This is where new rows will be appended dynamically -->
                                        </tbody>
                                    </table>


                                    <!-- <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Data-data dalam formulir pendaftaran ini saya isi dengan sebenar-benarnya dan sejujurnya
                                            sesuai dengan keadaan yang sebenarnya untuk dipergunakan bagi perkembangan pendidikan anak
                                            saya.
                                        </label>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

                </div>
        </div>
    </section>
</main>

<!-- JavaScript for step navigation -->
<script>
    let currentStep = 0;
    const steps = document.querySelectorAll('.tab-pane');
    const stepIndicator = document.querySelectorAll('.nav-tabs .nav-link');
    const btnNext = document.querySelectorAll('.btn-next');
    const btnPrev = document.querySelectorAll('.btn-prev');

    function showStep(step) {
        // Remove 'show' and 'active' class from all steps and hide them
        steps.forEach((el, index) => {
            el.classList.remove('show', 'active'); // Hide all steps
            stepIndicator[index].classList.remove('active'); // Deactivate step indicator
        });

        // Show the current step and activate the respective tab
        steps[step].classList.add('show', 'active');
        stepIndicator[step].classList.add('active');

        // Scroll to the top of the page whenever a new step is shown
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Smooth scrolling to the top
        });
    }

    btnNext.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Only for next/prev buttons, not the submit button!
            if (validateStep(currentStep)) {
                currentStep++;
                showStep(currentStep);
            }
        });
    });


    btnPrev.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default behavior
            currentStep--; // Move to the previous step
            showStep(currentStep); // Show the previous step and scroll to the top
        });
    });

    // Initialize by showing the first step
    showStep(currentStep);

    function validateStep(step) {
        const inputs = steps[step].querySelectorAll('input[required], select[required], textarea[required]');
        let formIsValid = true;

        inputs.forEach(input => {
            if (!input.checkValidity()) {
                input.reportValidity(); // Show error message for invalid input
                formIsValid = false;
                console.log("Validation failed on:", input.name || input.id, "Value:", input.value);
            } else {
                console.log("Validation passed for:", input.name || input.id);
            }
        });

        return formIsValid;
    }
</script>

<script>
    document.getElementById('confirmSubmit').addEventListener('click', function(e) {
        document.querySelector('form').submit(); // Submit the form
        e.preventDefault()

        var data = new FormData(this)

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
        if (selectedValue === "1") {
            input.placeholder = "Masukan detail golongan";
            input.style.display = "block"; // Tampilkan input
        } else if (selectedValue === "2") {
            input.placeholder = "Masukan jabatan Ayah";
            input.style.display = "block"; // Tampilkan input
        } else if (selectedValue >= 3 && selectedValue <= 4) {
            input.placeholder = "Masukan bidang usaha Ayah";
            input.style.display = "block"; // Tampilkan input
        } else if (selectedValue >= 5 && selectedValue <= 6) {
            input.placeholder = "Masukan pangkat Ayah";
            input.style.display = "block"; // Tampilkan input
        } else if (selectedValue === "8") {
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
        if (selectedValue === "1") {
            input.placeholder = "Masukan detail golongan";
            input.style.display = "block"; // Tampilkan input
        } else if (selectedValue === "2") {
            input.placeholder = "Masukan jabatan Ibu";
            input.style.display = "block"; // Tampilkan input
        } else if (selectedValue >= 3 && selectedValue <= 4) {
            input.placeholder = "Masukan bidang usaha Ibu";
            input.style.display = "block"; // Tampilkan input
        } else if (selectedValue >= 5 && selectedValue <= 6) {
            input.placeholder = "Masukan pangkat Ibu";
            input.style.display = "block"; // Tampilkan input
        } else if (selectedValue === "8") {
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
    let counter = 0; // Counter for tracking the tanggungan entries

    // Event listener for uangSekolah input formatting
    document.getElementById('uangSekolahTg').addEventListener('input', function() {
        let value = this.value.replace(/\D/g, ''); // Remove non-numeric characters
        let formattedValue = new Intl.NumberFormat('id-ID').format(value); // Format to currency
        this.value = 'Rp. ' + formattedValue;
    });

    // Save tanggungan data and display it in the table
    document.getElementById('saveTanggungan').addEventListener('click', function() {
        // Get form values
        const namaLengkap = document.getElementById('namaLengkapTg').value;
        const sekolah = document.getElementById('sekolahTg').value;
        const kelas = document.getElementById('kelasTg').value;
        const uangSekolah = document.getElementById('uangSekolahTg').value.replace(/\D/g,
            ''); // Keep only numeric
        const keterangan = document.getElementById('keteranganTg').value;

        // Add new tanggungan object to the array
        const newTanggungan = {
            namaLengkap,
            sekolah,
            kelas,
            uangSekolah,
            keterangan
        };
        tanggunganData.push(newTanggungan);

        // Update the table with the new entry
        updateTable();

        // Reset the form
        document.getElementById('tanggunganForm').reset();
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

        updateHiddenInputs(); // Refresh hidden inputs
    }

    // Function to delete a row and update the array
    function deleteRow(index) {
        tanggunganData.splice(index, 1); // Remove the selected entry
        updateTable(); // Re-render the table
    }

    // Function to create hidden inputs for form submission
    function updateHiddenInputs() {
        const form = document.getElementById('tanggunganForm');
        form.querySelectorAll('input[type="hidden"]').forEach(input => input.remove()); // Clear old inputs

        tanggunganData.forEach((tanggungan, index) => {
            form.insertAdjacentHTML('beforeend', `
            <input type="hidden" name="tanggungan[${index}][namaLengkap]" value="${tanggungan.namaLengkap}">
            <input type="hidden" name="tanggungan[${index}][sekolah]" value="${tanggungan.sekolah}">
            <input type="hidden" name="tanggungan[${index}][kelas]" value="${tanggungan.kelas}">
            <input type="hidden" name="tanggungan[${index}][uangSekolah]" value="${tanggungan.uangSekolah}">
            <input type="hidden" name="tanggungan[${index}][keterangan]" value="${tanggungan.keterangan}">
        `);
        });
    }
</script>
@endsection
