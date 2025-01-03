@extends('layout.app')
@section('title', 'Data Siswa')
@section('content')

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

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
                    </ul>
                </div>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                    <form action="{{ route('step1.post') }}" method="POST" id="formdata-step1">
                        @csrf
                        <input type="hidden" name="step" value="1">
                        <input type="hidden" name="user_id" value="{{ optional($registration)->user_id }}">
                        <div class="tab-pane fade @if ($step == 1) show active @endif" id="step1">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <h4 class="text-center mb-3">Data Siswa Baru</h4>
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-3 mt-3">
                                                <label for="namaLengkap" class="form-label">Nama Lengkap <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="namaLengkap"
                                                    name="nama_lengkap" required autofocus
                                                    value="{{ old('nama_lengkap', $registration->nama_lengkap ?? '') }}"
                                                    placeholder="Masukkan nama lengkap">
                                                <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                            </div>
                                            <div class="mb-3">
                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span
                                                        class="text-danger">*</span></label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                        id="lakiLaki" value="Laki-laki"
                                                        {{ old('jenis_kelamin', $registration->jenis_kelamin ?? '') == 'Laki-laki' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="lakiLaki">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                        id="perempuan" value="Perempuan"
                                                        {{ old('jenis_kelamin', $registration->jenis_kelamin ?? '') == 'Perempuan' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                                </div>
                                                <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                            </div>
                                            <div>
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="tempat_lahir"
                                                    name="tempat_lahir"
                                                    value="{{ old('tempat_lahir', $registration->tempat_lahir ?? '') }}"
                                                    placeholder="Masukkan Tempat Lahir">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir<span
                                                        class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="tanggal_lahir"
                                                    name="tanggal_lahir"
                                                    value="{{ old('tanggal_lahir', $registration->tanggal_lahir ?? '') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tinggi" class="form-label">Tinggi (cm)<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="tinggi" name="tinggi"
                                                    placeholder="Masukkan Tinggi Badan"
                                                    value="{{ old('tinggi', $registration->tinggi ?? '') }} ">
                                            </div>
                                            <div class="mb-3">
                                                <label for="text" class="form-label">Berat (kg)<span
                                                        class="text-danger">*</span></label>
                                                <input type="numb" class="form-control" id="berat" name="berat"
                                                    placeholder="Masukkan Berat Badan"
                                                    value="{{ old('berat', $registration->berat ?? '') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="anak_ke" class="form-label">Anak Ke Berapa dalam keluarga
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="anak_ke" name="anak_ke"
                                                    placeholder="Masukkan Jumlah Saudara Kandung"
                                                    value="{{ old('anak_ke', $registration->anak_ke ?? '') }} ">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jumlah_saudara_kandung" class="form-label">Jumlah Saudara
                                                    Kandung<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="jumlah_saudara_kandung"
                                                    name="jumlah_saudara_kandung"
                                                    placeholder="Masukkan Jumlah Saudara Kandung"
                                                    value="{{ old('jumlah_saudara_kandung', $registration->jumlah_saudara_kandung ?? '') }} ">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jumlah_saudara_tiri" class="form-label">Jumlah Saudara
                                                    Tiri<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="jumlah_saudara_tiri"
                                                    name="jumlah_saudara_tiri" placeholder="Masukkan Jumlah Saudara Tiri"
                                                    value="{{ old('jumlah_saudara_tiri', $registration->jumlah_saudara_tiri ?? '') }} ">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jumlah_saudara_angkat" class="form-label">Jumlah Saudara
                                                    Angkat<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="jumlah_saudara_angkat"
                                                    name="jumlah_saudara_angkat"
                                                    placeholder="Masukkan jumlah saudara angkat"
                                                    value="{{ old('jumlah_saudara_angkat', $registration->jumlah_saudara_angkat ?? '') }} ">
                                            </div>
                                            <div class="mb-3">
                                                <label for="bahasa" class="form-label">Bahasa yang digunakan dalam
                                                    keluarga<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="bahasa" name="bahasa"
                                                    placeholder="Masukkan bahasa yang digunakan sehari-hari"
                                                    value="{{ old('bahasa', $registration->bahasa ?? '') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Halaman kedua-->
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <form>
                                                <div class="mb-3 mt-3">
                                                    <label for="alamat_anak" class="form-label">Alamat<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="alamat_anak"
                                                        name="alamat_anak" placeholder="Masukkan alamat tempat tinggal"
                                                        value="{{ old('alamat_anak', $registration->alamat_anak ?? '') }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nik" class="form-label">NIK (Nomor Induk
                                                        Kependudukan)<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="nik"
                                                        name="nik" placeholder="Masukkan nomor NIK" maxlength="16"
                                                        pattern="\d{16}" title="NIK harus 16 digit angka"
                                                        value="{{ old('nik', $registration->nik ?? '') }}"
                                                        oninput="validateInput('nik', 'nikAlert')" required>
                                                    <div id="nikAlert" class="text-danger mt-2" style="display: none;">
                                                        NIK Harus Berisi 16 Angka</div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="nomor_kk" class="form-label">Nomor Kartu Keluarga<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="nomor_kk"
                                                        name="nomor_kk" placeholder="Masukkan nomor KK" maxlength="16"
                                                        pattern="\d{16}" title="Nomor KK harus 16 digit angka" required
                                                        value="{{ old('nomor_kk', $registration->nomor_kk ?? '') }}"
                                                        oninput="validateInput('nomor_kk', 'KKAlert')">
                                                    <div id="KKAlert" class="text-danger mt-2" style="display: none;">
                                                        KK Harus Berisi 16 Angka</div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="no_regis_akta" class="form-label">Nomor Registrasi Akta
                                                        Kelahiran<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="no_regis_akta"
                                                        name="no_regis_akta"
                                                        placeholder="Masukkan nomor Registrasi Akta Kelahiran"
                                                        maxlength="12" pattern="\d{12}"
                                                        title="Nomor Registrasi Akta Kelahiran harus 12 digit karakter"
                                                        required
                                                        value="{{ old('no_regis_akta', $registration->no_regis_akta ?? '') }}"
                                                        oninput="validateInput('no_regis_akta', 'aktaAlert')">
                                                    <div id="aktaAlert" class="text-danger mt-2" style="display: none;">
                                                        Nomor Registrasi Akta Kelahiran Harus Berisi 12 karakter</div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="jarak" class="form-label">Jarak Tempat Tinggal Ke
                                                        Sekolah<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="jarak"
                                                        name="jarak"
                                                        placeholder="Masukkan jarak tempat tinggal ke sekolah"
                                                        value="{{ old('jarak', $registration->jarak ?? '') }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tempat_tinggal" class="form-label">Tempat Tinggal Saat
                                                        Ini<span class="text-danger">*</span></label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="tempat_tinggal" id="rumahSendiri"
                                                            value="Dirumah sendiri bersama orang tua"
                                                            {{ old('tempat_tinggal', $registration->tempat_tinggal ?? '') == 'Dirumah sendiri bersama orang tua' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="rumahSendiri">Di rumah
                                                            sendiri bersama orang
                                                            tua</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="tempat_tinggal" id="rumahFamili"
                                                            value="Dirumah famili/kerabat"
                                                            {{ old('jenis_kelamin', $registration->jenis_kelamin ?? '') == 'Dirumah famili/kerabat' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="rumahFamili">Di rumah
                                                            famili/kerabat</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="transportasi" class="form-label">Transportasi Ke
                                                        Sekolah<span class="text-danger">*</span></label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="transportasi[]" id="jalanKaki"
                                                                    value="Jalan Kaki"
                                                                    {{ is_array(old('transportasi', $registration->transportasi ?? [])) && in_array('Jalan Kaki', old('transportasi', $registration->transportasi ?? [])) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="jalanKaki">Jalan
                                                                    Kaki</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="transportasi[]" id="sepedaMotor"
                                                                    value="Sepeda Motor"
                                                                    {{ is_array(old('transportasi', $registration->transportasi ?? [])) && in_array('Sepeda Motor', old('transportasi', $registration->transportasi ?? [])) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="sepedaMotor">Sepeda
                                                                    Motor</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="transportasi[]" id="busSekolah"
                                                                    value="Bus Sekolah"
                                                                    {{ is_array(old('transportasi', $registration->transportasi ?? [])) && in_array('Bus Sekolah', old('transportasi', $registration->transportasi ?? [])) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="busSekolah">Bus
                                                                    Sekolah</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="transportasi[]" id="angkutanUmum"
                                                                    value="Angkutan Umum"
                                                                    {{ is_array(old('transportasi', $registration->transportasi ?? [])) && in_array('Angkutan Umum', old('transportasi', $registration->transportasi ?? [])) ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="angkutanUmum">Angkutan Umum</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="transportasi[]" id="sepeda" value="Sepeda"
                                                                    {{ is_array(old('transportasi', $registration->transportasi ?? [])) && in_array('Sepeda', old('transportasi', $registration->transportasi ?? [])) ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="sepeda">Sepeda</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="transportasi[]" id="mobil" value="Mobil"
                                                                    {{ is_array(old('transportasi', $registration->transportasi ?? [])) && in_array('Mobil', old('transportasi', $registration->transportasi ?? [])) ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="mobil">Mobil</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="transportasi[]" id="lainLain"
                                                                    value="Lain-lain"
                                                                    {{ is_array(old('transportasi', $registration->transportasi ?? [])) && in_array('Lain-lain', old('transportasi', $registration->transportasi ?? [])) ? 'checked' : '' }}
                                                                    onclick="toggleInputLainLain()">
                                                                <label class="form-check-label"
                                                                    for="lainLain">Lain-lain</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Input text that appears when 'Lain-lain' is selected -->
                                                    <div id="inputLainLain" class="mt-3"
                                                        style="display: {{ is_array(old('transportasi', $registration->transportasi ?? [])) && in_array('Lain-lain', old('transportasi', $registration->transportasi ?? [])) ? 'block' : 'none' }};">
                                                        <label for="transportasiLain" class="form-label">Masukkan
                                                            Transportasi Lain</label>
                                                        <input type="text" class="form-control" id="transportasiLain"
                                                            name="transportasiLain"
                                                            value="{{ old('transportasiLain', $registration->transportasiLain ?? '') }}"
                                                            placeholder="Masukkan transportasi lain">
                                                    </div>
                                                </div>

                                                <script>
                                                    function toggleInputLainLain() {
                                                        const lainCheckbox = document.getElementById('lainLain');
                                                        const inputLainLain = document.getElementById('inputLainLain');
                                                        inputLainLain.style.display = lainCheckbox.checked ? 'block' : 'none';
                                                    }
                                                </script>
                                            </form><!-- End General Form Elements -->

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- General Form Elements -->
                                            <div class="mb-3">
                                                <h5 class="card-title" for="sekolahAsal">Sebelum Masuk di SD ini
                                                    berasal dari TK (Opsional)</h5>
                                                <div class="container">
                                                    <div class="mb-3">
                                                        <label for="namaSekolah" class="form-label">Nama
                                                            Sekolah</label>
                                                        <input type="text" class="form-control" id="namaSekolah"
                                                            name="nama_sekolah_dulu" placeholder="Masukkan nama sekolah"
                                                            value="{{ old('nama_sekolah_dulu', $registration->nama_sekolah_dulu ?? '') }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="nspnSekolah" class="form-label">NSPN
                                                            Sekolah</label>
                                                        <input type="text" class="form-control" id="nspnSekolah"
                                                            name="nspn_sekolah" placeholder="Masukkan NSPN sekolah"
                                                            value="{{ old('nspn_sekolah', $registration->nspn_sekolah ?? '') }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="alamatSekolah" class="form-label">Alamat</label>
                                                        <input type="text" class="form-control" id="alamatSekolah"
                                                            name="alamat_sekolah_dulu"
                                                            placeholder="Masukkan alamat sekolah"
                                                            value="{{ old('alamat_sekolah_dulu', $registration->alamat_sekolah_dulu ?? '') }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="desaSekolah" class="form-label">Desa/Kelurahan</label>
                                                        <input type="text" class="form-control" id="desaSekolah"
                                                            name="desa_sekolah" placeholder="Masukkan desa sekolah"
                                                            value="{{ old('desa_sekolah', $registration->desa_sekolah ?? '') }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="kabupatenSekolah"
                                                            class="form-label">Kabupaten/Kota</label>
                                                        <input type="text" class="form-control" id="kabupatenSekolah"
                                                            name="kabupaten_sekolah"
                                                            placeholder="Masukkan kabupaten sekolah"
                                                            value="{{ old('kabupaten_sekolah', $registration->kabupaten_sekolah ?? '') }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="nisn" class="form-label">NISN</label>
                                                        <input type="text" class="form-control" id="nisn"
                                                            name="nisn" placeholder="Masukkan NISN"
                                                            value="{{ old('nisn', $registration->nisn ?? '') }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="tanggalSKTB" class="form-label">Tanggal
                                                            SKTB</label>
                                                        <input type="date" class="form-control" id="tanggalSKTB"
                                                            name="tanggal_sktb"
                                                            value="{{ old('tanggal_sktb', $registration->tanggal_sktb ?? '') }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="nomorSKTB" class="form-label">Nomor SKTB</label>
                                                        <input type="text" class="form-control" id="nomorSKTB"
                                                            name="nomor_sktb" placeholder="Masukkan nomor SKTB"
                                                            value="{{ old('nomor_sktb', $registration->nomor_sktb ?? '') }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="lamaTK" class="form-label">Lama Pendidikan
                                                            TK</label>
                                                        <input type="text" class="form-control" id="lamaTK"
                                                            name="lama_tk" placeholder="Masukkan lama pendidikan TK"
                                                            value="{{ old('lama_tk', $registration->lama_tk ?? '') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary">Berikutnya</button>
                            </div>
                        </div>
                    </form>
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
        document.getElementById('formdata-step1').addEventListener('submit', function() {
            const submitButton = document.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.innerText = 'Processing...'; // Optional: change button text
        });
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


    {{-- Script for the NIK, KK, Akta Kelahiran Field --}}
    <script>
        function validateInput(inputId, alertId) {
            const inputField = document.getElementById(inputId);
            const alertField = document.getElementById(alertId);

            let requiredLength;
            if (inputId === 'nik' || inputId === 'nomor_kk') {
                requiredLength = 16;
            } else if (inputId === 'no_regis_akta') {
                requiredLength = 12;
            }

            if (inputField.value.length === requiredLength && new RegExp(`\\d{${requiredLength}}$`).test(inputField
                    .value)) {
                alertField.style.display = 'none';
            } else {
                alertField.style.display = 'block';
            }
        }
    </script>


@endsection
