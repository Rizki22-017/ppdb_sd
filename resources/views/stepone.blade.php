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
                                                    placeholder="Masukkan nama lengkap">
                                                <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                            </div>
                                            <div class="mb-3">
                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span
                                                        class="text-danger">*</span></label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                        id="lakiLaki" value="Laki-laki">
                                                    <label class="form-check-label" for="lakiLaki">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                        id="perempuan" value="Perempuan">
                                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                                </div>
                                                <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                                            </div>
                                            <div>
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="tempat_lahir"
                                                    name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir<span
                                                        class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="tanggal_lahir"
                                                    name="tanggal_lahir">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tinggi" class="form-label">Tinggi (cm)<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="tinggi" name="tinggi"
                                                    placeholder="Masukkan Tinggi Badan">
                                            </div>
                                            <div class="mb-3">
                                                <label for="berat" class="form-label">Berat (kg)<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="berat" name="berat"
                                                    placeholder="Masukkan Berat Badan">
                                            </div>
                                            <div class="mb-3">
                                                <label for="anak_ke" class="form-label">Anak Ke Berapa dalam keluarga
                                                    <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="anak_ke" name="anak_ke"
                                                    placeholder="Masukkan Jumlah Saudara Kandung">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jumlah_saudara_kandung" class="form-label">Jumlah Saudara
                                                    Kandung<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="jumlah_saudara_kandung"
                                                    name="jumlah_saudara_kandung"
                                                    placeholder="Masukkan Jumlah Saudara Kandung">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jumlah_saudara_tiri" class="form-label">Jumlah Saudara
                                                    Tiri<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="jumlah_saudara_tiri"
                                                    name="jumlah_saudara_tiri" placeholder="Masukkan Jumlah Saudara Tiri">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jumlah_saudara_angkat" class="form-label">Jumlah Saudara
                                                    Angkat<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="jumlah_saudara_angkat"
                                                    name="jumlah_saudara_angkat"
                                                    placeholder="Masukkan jumlah saudara angkat">
                                            </div>
                                            <div class="mb-3">
                                                <label for="bahasa" class="form-label">Bahasa yang digunakan dalam
                                                    keluarga<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="bahasa" name="bahasa"
                                                    placeholder="Masukkan bahasa yang digunakan sehari-hari">
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
                                                        name="alamat_anak" placeholder="Masukkan alamat tempat tinggal">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nik" class="form-label">NIK (Nomor Induk
                                                        Kependudukan)<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="nik"
                                                        name="nik" placeholder="Masukkan nomor NIK" maxlength="16"
                                                        pattern="\d{16}" title="NIK harus 16 digit angka" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nomor_kk" class="form-label">Nomor Kartu Keluarga<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="nomor_kk"
                                                        name="nomor_kk" placeholder="Masukkan nomor KK" maxlength="16"
                                                        pattern="\d{16}" title="Nomor KK harus 16 digit angka" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_regis_akta" class="form-label">Nomor Registrasi Akta
                                                        Kelahiran<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="no_regis_akta"
                                                        name="no_regis_akta"
                                                        placeholder="Masukkan nomor Registrasi Akta Kelahiran"
                                                        maxlength="16" pattern="\d{16}"
                                                        title="Nomor Registrasi Akta Kelahiran harus 16 digit angka"
                                                        required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="jarak" class="form-label">Jarak Tempat Tinggal Ke
                                                        Sekolah<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="jarak"
                                                        name="jarak"
                                                        placeholder="Masukkan jarak tempat tinggal ke sekolah">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tempat_tinggal" class="form-label">Tempat Tinggal Saat
                                                        Ini<span class="text-danger">*</span></label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="tempat_tinggal" id="rumahSendiri"
                                                            value="Dirumah sendiri bersama orang tua">
                                                        <label class="form-check-label" for="rumahSendiri">Di rumah
                                                            sendiri bersama orang
                                                            tua</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="tempat_tinggal" id="rumahFamili"
                                                            value="Dirumah famili/kerabat">
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
                                                                    value="Jalan Kaki">
                                                                <label class="form-check-label" for="jalanKaki">Jalan
                                                                    Kaki</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="transportasi[]" id="sepedaMotor"
                                                                    value="Sepeda Motor">
                                                                <label class="form-check-label" for="sepedaMotor">Sepeda
                                                                    Motor</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="transportasi[]" id="busSekolah"
                                                                    value="Bus Sekolah">
                                                                <label class="form-check-label" for="busSekolah">Bus
                                                                    Sekolah</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="transportasi[]" id="angkutanUmum"
                                                                    value="Angkutan Umum">
                                                                <label class="form-check-label"
                                                                    for="angkutanUmum">Angkutan Umum</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="transportasi[]" id="sepeda" value="Sepeda">
                                                                <label class="form-check-label"
                                                                    for="sepeda">Sepeda</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="transportasi[]" id="mobil" value="Mobil">
                                                                <label class="form-check-label"
                                                                    for="mobil">Mobil</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="transportasi[]" id="lainLain"
                                                                    value="Lain-lain">
                                                                <label class="form-check-label"
                                                                    for="lainLain">Lain-lain</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Input teks yang akan muncul jika 'Lain-lain' dipilih -->
                                                    <div id="inputLainLain" class="mt-3" style="display:none;">
                                                        <label for="transportasiLain" class="form-label">Masukkan
                                                            Transportasi
                                                            Lain</label>
                                                        <input type="text" class="form-control" id="transportasiLain"
                                                            name="transportasiLain"
                                                            placeholder="Masukkan transportasi lain">
                                                    </div>
                                                </div>
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
                                            <form>
                                                <div class="mb-3">
                                                    <h5 class="card-title" for="sekolahAsal">Sebelum Masuk di SD ini
                                                        berasal dari TK</h5>
                                                    <div class="container">
                                                        <div class="mb-3">
                                                            <label for="namaSekolah" class="form-label">Nama
                                                                Sekolah</label>
                                                            <input type="text" class="form-control" id="namaSekolah"
                                                                name="namaSekolah" placeholder="Masukkan nama sekolah">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="nspnSekolah" class="form-label">NSPN
                                                                Sekolah</label>
                                                            <input type="text" class="form-control" id="nspnSekolah"
                                                                name="nspnSekolah" placeholder="Masukkan NSPN sekolah">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="alamatSekolah" class="form-label">Alamat</label>
                                                            <input type="text" class="form-control" id="alamatSekolah"
                                                                name="alamatSekolah"
                                                                placeholder="Masukkan alamat sekolah">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="desaSekolah"
                                                                class="form-label">Desa/Kelurahan</label>
                                                            <input type="text" class="form-control" id="desaSekolah"
                                                                name="desaSekolah" placeholder="Masukkan desa sekolah">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="kabupatenSekolah"
                                                                class="form-label">Kabupaten?Kota</label>
                                                            <input type="text" class="form-control"
                                                                id="kabupatenSekolah" name="kabupatenSekolah"
                                                                placeholder="Masukkan kabupaten sekolah">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="nisn" class="form-label">NISN</label>
                                                            <input type="text" class="form-control" id="nisn"
                                                                name="nisn" placeholder="Masukkan NISN">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="tanggalSKTB" class="form-label">Tanggal
                                                                SKTB</label>
                                                            <input type="date" class="form-control" id="tanggalSKTB"
                                                                name="tanggalSKTB">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="nomorSKTB" class="form-label">Nomor SKTB</label>
                                                            <input type="text" class="form-control" id="nomorSKTB"
                                                                name="nomorSKTB" placeholder="Masukkan nomor SKTB">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="lamaTK" class="form-label">Lama Pendidikan
                                                                TK</label>
                                                            <input type="text" class="form-control" id="lamaTK"
                                                                name="lamaTK" placeholder="Masukkan lama pendidikan TK">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form><!-- End General Form Elements -->
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
@endsection
