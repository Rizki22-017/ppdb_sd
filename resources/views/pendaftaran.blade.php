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
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                    <h4>Step 1 : Data Siswa</h4>
                </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                    <h4>Step 2 : Data Orang Tua</h4>
                </a><!-- End tab nav item -->

                </li>
                <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                    <h4>Step 3 : Data Wali</h4>
                </a>
                </li><!-- End tab nav item -->

            </ul>

            </div>

            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

            <div class="tab-pane fade active show" id="features-tab-1">
                @include('step.step1')
            </div><!-- End tab content item -->

            <div class="tab-pane fade" id="features-tab-2">
                @include('step.step2')
            </div><!-- End tab content item -->

            <div class="tab-pane fade" id="features-tab-3">
                @include('step.step3')
            </div><!-- End tab content item -->

            </div>

        </div>

        </section><!-- /Features Section -->


    </main>

    <script>
        function toggleInputPendidikan() {
          const pendidikanAyah = document.querySelector('input[name="pendidikanAyah"]:checked');
          const pendidikanIbu = document.querySelector('input[name="pendidikanIbu"]:checked');

          const inputLainPendidikanAyah = document.getElementById('inputLainPendidikanAyah');
          const inputLainPendidikanIbu = document.getElementById('inputLainPendidikanIbu');

          // Menampilkan atau menyembunyikan input berdasarkan status radio button
          inputLainPendidikanAyah.style.display = pendidikanAyah && pendidikanAyah.value === 'Lain-lain' ? 'block' : 'none';
          inputLainPendidikanIbu.style.display = pendidikanIbu && pendidikanIbu.value === 'Lain-lain' ? 'block' : 'none';
        }

        function toggleInputRekreasi() {
          const lainCheckbox = document.getElementById('rekreasi5');
          const inputLainRekreasi = document.getElementById('inputLainRekreasi');

          inputLainRekreasi.style.display = lainCheckbox.checked ? 'block' : 'none';
        }

        function updatePlaceholder() {
          const select = document.getElementById('jobSelect');
          const input = document.getElementById('detailInput');

          // Ambil nilai yang dipilih
          const selectedValue = select.value;

          // Ubah placeholder dan tampilkan input berdasarkan pilihan
          if (selectedValue >= 1 && selectedValue <= 7) {
            input.placeholder = "Masukan detail golongan";
            input.style.display = "block"; // Tampilkan input
          } else if (selectedValue === "8") {
            input.placeholder = "Masukan pekerjaan ayah";
            input.style.display = "block"; // Tampilkan input
          } else {
            input.placeholder = ""; // Kosongkan placeholder
            input.style.display = "none"; // Sembunyikan input
          }
        }
    </script>


    <!-- ini javascript jozu -->
    <script>
        let currentStep = 0;
        const steps = document.querySelectorAll('.step');
        const stepIndicator = document.querySelectorAll('.step-indicator div');
        const btnNext = document.querySelectorAll('.btn-next');
        const btnPrev = document.querySelectorAll('.btn-prev');

        function showStep(step) {
            steps.forEach((el, index) => {
                el.classList.toggle('active', index === step);
                stepIndicator[index].classList.toggle('active', index === step);
            });
        }

        function validateStep(step) {
            // Ambil hanya input yang memiliki atribut 'required'
            const inputs = steps[step].querySelectorAll('input[required]');
            let formIsValid = true;

            // Cek semua input 'required' dan berhenti jika ada yang tidak valid
            for (let input of inputs) {
                if (!input.reportValidity()) {
                    formIsValid = false;
                    break; // Hentikan validasi setelah menemukan input yang tidak valid
                }
            }

            return formIsValid;
        }


        btnNext.forEach(button => {
            button.addEventListener('click', () => {
                if (validateStep(currentStep)) { // Validasi menggunakan required
                    currentStep++;
                    showStep(currentStep);
                }
            });
        });

        btnPrev.forEach(button => {
            button.addEventListener('click', () => {
                currentStep--;
                showStep(currentStep);
            });
        });

        showStep(currentStep); // Show the first step on page load
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
                    inputLainLainSuku.style.display = 'block'; // Tampilkan input teks jika 'Lain-lain' dipilih
                } else {
                    inputLainLainSuku.style.display = 'none'; // Sembunyikan input teks jika 'Lain-lain' tidak dipilih
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
                inputLainLainKewarganegaraan.style.display = 'block'; // Tampilkan input teks jika 'Lain-lain' dipilih
            }
        });

        indonesiaRadio.addEventListener('change', function() {
            if (this.checked) {
                inputLainLainKewarganegaraan.style.display = 'none'; // Sembunyikan input teks jika 'Indonesia' dipilih
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
                    inputLainLainAgama.style.display = 'block'; // Tampilkan input teks jika 'Lain-lain' dipilih
                } else {
                    inputLainLainAgama.style.display = 'none'; // Sembunyikan input teks jika 'Lain-lain' tidak dipilih
                }
            });
        });
    </script>

@endsection



