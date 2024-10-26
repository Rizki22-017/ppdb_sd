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
                    <form action="{{ route('step2.post', $register_id) }}" method="POST" id="step2Form">
                        @csrf

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
                                                name="nama_lengkap_ayah" required placeholder="Masukan nama lengkap ayah">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nikAyah" class="form-label">NIK Ayah<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="nikAyah" name="nik_ayah"
                                                required placeholder="Masukan NIK ayah" maxlength="16" pattern="\d{16}">
                                        </div>

                                        <!-- Additional fields for Data Orang Tua go here -->

                                        <!-- Tanggungan Data Section -->
                                        <div class="mb-3">
                                            <label for="dataTanggungan" class="form-label">Nama anak yang menjadi
                                                tanggungan<span class="text-danger">*</span></label>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#tambahTanggungan">Tambahkan data tanggungan</button>
                                        </div>

                                        <!-- Hidden inputs for tanggungan data -->
                                        <div id="hiddenInputsContainer"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submission Button -->
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>

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
                                        <input type="text" class="form-control" id="namaLengkapTg">
                                    </div>
                                    <div class="mb-3">
                                        <label for="sekolahTg" class="form-label">Sekolah/Kampus</label>
                                        <input type="text" class="form-control" id="sekolahTg">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kelasTg" class="form-label">Kelas/Semester</label>
                                        <input type="text" class="form-control" id="kelasTg">
                                    </div>
                                    <div class="mb-3">
                                        <label for="uangSekolahTg" class="form-label">Uang Sekolah</label>
                                        <input type="text" class="form-control" id="uangSekolahTg">
                                    </div>
                                    <div class="mb-3">
                                        <label for="keteranganTg" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keteranganTg">
                                    </div>
                                    <button type="button" class="btn btn-primary" id="saveTanggungan">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
        </section>
    </main>

    <!-- JavaScript for step navigation -->


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

        // Save tanggungan data and update the table and hidden inputs
        document.getElementById('saveTanggungan').addEventListener('click', function() {
            const namaLengkap = document.getElementById('namaLengkapTg').value;
            const sekolah = document.getElementById('sekolahTg').value;
            const kelas = document.getElementById('kelasTg').value;
            const uangSekolah = document.getElementById('uangSekolahTg').value.replace(/\D/g,
                ''); // Remove non-numeric
            const keterangan = document.getElementById('keteranganTg').value;

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

            // Close modal and reset form
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
