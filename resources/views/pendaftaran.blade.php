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
                    <!-- Form untuk Step 1 -->
                    <form action="{{ route('step1.post') }}" method="POST" id="formdata-step1">
                        @csrf
                        <input type="hidden" name="step" value="1">
                        <input type="hidden" name="user_id" value="{{ $registration->user_id }}">
                        <!-- Input hidden untuk user_id -->

                        <!-- Include Step 1 partial -->
                        <div class="tab-pane fade @if ($step == 1) show active @endif" id="step1">
                            @include('step.step1')
                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary">Berikutnya</button>
                            </div>
                        </div>
                    </form>

                    <form action="{{ route('step2.post') }}" method="POST" id="formdata-step2">
                        @csrf
                        <input type="hidden" name="step" value="2">
                        <input type="hidden" name="user_id" value="{{ $registration->user_id }}">
                        <!-- Input hidden untuk user_id -->

                        <!-- Include Step 2 partial -->
                        <div class="tab-pane fade @if ($step == 2) show active @endif" id="step2">
                            @include('step.step2')
                            <div class="d-flex justify-content-between mt-4">
                                <!-- Use optional($registration)->user_id to avoid errors if $registration is null -->
                                <a href="{{ route('step1.show', ['user_id' => optional($registration)->user_id]) }}"
                                    class="btn btn-secondary">Sebelumnya</a>


                                <button type="submit" class="btn btn-primary">Berikutnya</button>
                            </div>
                        </div>
                    </form>

                    <!-- Step 3: Data Wali -->
                    <form action="{{ route('step3.post') }}" method="POST" id="formdata-step3">
                        @csrf
                        <input type="hidden" name="step" value="2">
                        <input type="hidden" name="user_id" value="{{ $registration->user_id }}">
                        <!-- Input hidden untuk user_id -->

                        <div class="tab-pane fade @if ($step == 3) show active @endif" id="step3">
                            @include('step.step3')
                            <div class="d-flex justify-content-between mt-4">
                                <!-- In the Step 2 form -->
                                <a href="{{ route('step2.show', ['user_id' => $registration->user_id]) }}"
                                    class="btn btn-secondary">Sebelumnya</a>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Lanjutkan
                                </button>
                            </div>

                            <!-- Modal for final confirmation -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Perhatian!</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p style="text-decoration: underline;"><b>Harap persiapkan data berikut :</b>
                                            </p>
                                            <ol>
                                                <li>Fotocopy Akte Kelahiran</li>
                                                <li>Fotocopy Kartu Keluarga</li>
                                                <li>Fotocopy KTP Orang Tua/Wali Murid</li>
                                                <li>Pas Photo Ukuran 3x4 Sebanyak 1 Lembar</li>
                                                <li>Fotocopy Ijazah TK (jika ada)</li>
                                            </ol>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <!-- This button will submit the form on confirmation -->
                                            <button type="submit" class="btn btn-primary">Lanjutkan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section><!-- /Features Section -->
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
