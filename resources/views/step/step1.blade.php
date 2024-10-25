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
                            <input type="text" class="form-control" id="namaLengkap" name="nama_lengkap" required
                                autofocus placeholder="Masukkan nama lengkap">
                            <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span
                                    class="text-danger">*</span></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="lakiLaki"
                                    value="Laki-laki">
                                <label class="form-check-label" for="lakiLaki">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan"
                                    value="Perempuan">
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                            <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                        </div>
                        <div>
                            <label for="tempat_lahir" class="form-label">Tempat Lahir<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                placeholder="Masukkan Tempat Lahir">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
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
                            <label for="anak_ke" class="form-label">Anak Ke Berapa dalam keluarga <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="anak_ke" name="anak_ke"
                                placeholder="Masukkan Jumlah Saudara Kandung">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_saudara_kandung" class="form-label">Jumlah Saudara Kandung<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="jumlah_saudara_kandung"
                                name="jumlah_saudara_kandung" placeholder="Masukkan Jumlah Saudara Kandung">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_saudara_tiri" class="form-label">Jumlah Saudara Tiri<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="jumlah_saudara_tiri"
                                name="jumlah_saudara_tiri" placeholder="Masukkan Jumlah Saudara Tiri">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_saudara_angkat" class="form-label">Jumlah Saudara Angkat<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="jumlah_saudara_angkat"
                                name="jumlah_saudara_angkat" placeholder="Masukkan jumlah saudara angkat">
                        </div>
                        <div class="mb-3">
                            <label for="bahasa" class="form-label">Bahasa yang digunakan dalam keluarga<span
                                    class="text-danger">*</span></label>
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
                                <input type="text" class="form-control" id="alamat_anak" name="alamat_anak"
                                    placeholder="Masukkan alamat tempat tinggal">
                            </div>
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan)<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nik" name="nik"
                                    placeholder="Masukkan nomor NIK" maxlength="16" pattern="\d{16}" title="NIK harus 16 digit angka" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_kk" class="form-label">Nomor Kartu Keluarga<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nomor_kk" name="nomor_kk"
                                    placeholder="Masukkan nomor KK" maxlength="16" pattern="\d{16}" title="Nomor KK harus 16 digit angka" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_regis_akta" class="form-label">Nomor Registrasi Akta Kelahiran<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="no_regis_akta" name="no_regis_akta"
                                    placeholder="Masukkan nomor Registrasi Akta Kelahiran" maxlength="16" pattern="\d{16}" title="Nomor Registrasi Akta Kelahiran harus 16 digit angka" required>
                            </div>

                            <div class="mb-3">
                                <label for="jarak" class="form-label">Jarak Tempat Tinggal Ke Sekolah<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="jarak" name="jarak"
                                    placeholder="Masukkan jarak tempat tinggal ke sekolah">
                            </div>
                            <div class="mb-3">
                                <label for="tempat_tinggal" class="form-label">Tempat Tinggal Saat Ini<span
                                        class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tempat_tinggal"
                                        id="rumahSendiri" value="Dirumah sendiri bersama orang tua">
                                    <label class="form-check-label" for="rumahSendiri">Di rumah sendiri bersama orang
                                        tua</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tempat_tinggal"
                                        id="rumahFamili" value="Dirumah famili/kerabat">
                                    <label class="form-check-label" for="rumahFamili">Di rumah famili/kerabat</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="transportasi" class="form-label">Transportasi Ke Sekolah<span
                                        class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="transportasi[]"
                                                id="jalanKaki" value="Jalan Kaki">
                                            <label class="form-check-label" for="jalanKaki">Jalan Kaki</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="transportasi[]"
                                                id="sepedaMotor" value="Sepeda Motor">
                                            <label class="form-check-label" for="sepedaMotor">Sepeda Motor</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="transportasi[]"
                                                id="busSekolah" value="Bus Sekolah">
                                            <label class="form-check-label" for="busSekolah">Bus Sekolah</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="transportasi[]"
                                                id="angkutanUmum" value="Angkutan Umum">
                                            <label class="form-check-label" for="angkutanUmum">Angkutan Umum</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="transportasi[]"
                                                id="sepeda" value="Sepeda">
                                            <label class="form-check-label" for="sepeda">Sepeda</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="transportasi[]"
                                                id="mobil" value="Mobil">
                                            <label class="form-check-label" for="mobil">Mobil</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="transportasi[]"
                                                id="lainLain" value="Lain-lain">
                                            <label class="form-check-label" for="lainLain">Lain-lain</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Input teks yang akan muncul jika 'Lain-lain' dipilih -->
                                <div id="inputLainLain" class="mt-3" style="display:none;">
                                    <label for="transportasiLain" class="form-label">Masukkan Transportasi
                                        Lain</label>
                                    <input type="text" class="form-control" id="transportasiLain"
                                        name="transportasiLain" placeholder="Masukkan transportasi lain">
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
                                <h5 class="card-title" for="sekolahAsal">Sebelum Masuk di SD ini berasal dari TK</h5>
                                <div class="container">
                                    <div class="mb-3">
                                        <label for="namaSekolah" class="form-label">Nama Sekolah</label>
                                        <input type="text" class="form-control" id="namaSekolah"
                                            name="namaSekolah" placeholder="Masukkan nama sekolah">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nspnSekolah" class="form-label">NSPN Sekolah</label>
                                        <input type="text" class="form-control" id="nspnSekolah"
                                            name="nspnSekolah" placeholder="Masukkan NSPN sekolah">
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamatSekolah" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="alamatSekolah"
                                            name="alamatSekolah" placeholder="Masukkan alamat sekolah">
                                    </div>

                                    <div class="mb-3">
                                        <label for="desaSekolah" class="form-label">Desa/Kelurahan</label>
                                        <input type="text" class="form-control" id="desaSekolah"
                                            name="desaSekolah" placeholder="Masukkan desa sekolah">
                                    </div>

                                    <div class="mb-3">
                                        <label for="kabupatenSekolah" class="form-label">Kabupaten?Kota</label>
                                        <input type="text" class="form-control" id="kabupatenSekolah"
                                            name="kabupatenSekolah" placeholder="Masukkan kabupaten sekolah">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nisn" class="form-label">NISN</label>
                                        <input type="text" class="form-control" id="nisn" name="nisn"
                                            placeholder="Masukkan NISN">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggalSKTB" class="form-label">Tanggal SKTB</label>
                                        <input type="date" class="form-control" id="tanggalSKTB"
                                            name="tanggalSKTB">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nomorSKTB" class="form-label">Nomor SKTB</label>
                                        <input type="text" class="form-control" id="nomorSKTB" name="nomorSKTB"
                                            placeholder="Masukkan nomor SKTB">
                                    </div>
                                    <div class="mb-3">
                                        <label for="lamaTK" class="form-label">Lama Pendidikan TK</label>
                                        <input type="text" class="form-control" id="lamaTK" name="lamaTK"
                                            placeholder="Masukkan lama pendidikan TK">
                                    </div>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
