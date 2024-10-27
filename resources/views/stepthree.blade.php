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
                                    <h4>Step 3 : Data Wali</h4>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                        <form action="{{ route('step3.post', $register_id) }}" method="POST" id="step3Form">
                            @csrf
                            <input type="hidden" name="step" value="3">
                            <input type="hidden" name="user_id" value="{{ $registration->user_id }}">

                            <!-- Data Wali Section -->
                            <div class="card mt-4">
                                <div class="card-body">
                                    <h5 class="card-title">Data Wali</h5>

                                    <div class="mb-3">
                                        <label for="nama_wali" class="form-label">Nama Wali</label>
                                        <input type="text" class="form-control" name="nama_wali" id="nama_wali"
                                            placeholder="Masukkan Nama Wali" maxlength="255">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tempat_lahir_wali" class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir_wali"
                                            id="tempat_lahir_wali" placeholder="Masukkan Tempat Lahir" maxlength="255">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_lahir_wali" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir_wali"
                                            id="tanggal_lahir_wali">
                                    </div>

                                    <div class="mb-3">
                                        <label for="pendidikan_wali" class="form-label">Pendidikan Terakhir</label>
                                        <input type="text" class="form-control" name="pendidikan_wali"
                                            id="pendidikan_wali" placeholder="Masukkan Pendidikan Terakhir" maxlength="255">
                                    </div>

                                    <div class="mb-3">
                                        <label for="hubungan_murid_wali" class="form-label">Hubungan Kekeluargaan dengan
                                            Murid</label>
                                        <input type="text" class="form-control" name="hubungan_murid_wali"
                                            id="hubungan_murid_wali" placeholder="Masukkan Hubungan Kekeluargaan"
                                            maxlength="255">
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat_wali" class="form-label">Alamat Wali</label>
                                        <input type="text" class="form-control" name="alamat_wali" id="alamat_wali"
                                            placeholder="Masukkan Alamat Wali" maxlength="255">
                                    </div>

                                    <div class="mb-3">
                                        <label for="kodepos_wali" class="form-label">Kode POS</label>
                                        <input type="text" class="form-control" name="kodepos_wali" id="kodepos_wali"
                                            placeholder="Masukkan Kode POS" maxlength="10">
                                    </div>

                                    <div class="mb-3">
                                        <label for="telepon_wali" class="form-label">Nomor Telepon</label>
                                        <input type="text" class="form-control" name="telepon_wali" id="telepon_wali"
                                            placeholder="Masukkan Nomor Telepon" maxlength="15">
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat_kantor_wali" class="form-label">Alamat Kantor/Tempat
                                            Kerja</label>
                                        <input type="text" class="form-control" name="alamat_kantor_wali"
                                            id="alamat_kantor_wali" placeholder="Masukkan Alamat Kantor/Tempat Kerja"
                                            maxlength="255">
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('step2.show', ['user_id' => $register_id]) }}"
                                class="btn btn-secondary mt-3">Back</a>
                            <!-- Submit Button with Modal Trigger -->
                            <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Submit
                            </button>

                            <!-- Modal Confirmation -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
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
                                            <button type="submit" class="btn btn-primary">Lanjutkan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    @endsection
