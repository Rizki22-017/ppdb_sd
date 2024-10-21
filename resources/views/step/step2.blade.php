<div class="row">
    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Orang Tua</h5>

                <!-- General Form Elements -->
                <form>
                    <div class="mb-3">
                        <label for="namaLengkap" class="form-label">Nama Lengkap Ayah <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="namaLengkapAyah" name="namaLengkapAyah" required
                            placeholder="Masukan nama lengkap ayah">
                        <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                    </div>
                    <div class="mb-3">
                        <label for="nikAyah" class="form-label">NIK Ayah<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nikAyah" name="nikAyah" required
                            placeholder="Masukan NIK ayah" maxlength="16" pattern="\d{16}"
                            title="NIK harus 16 digit angka">
                        <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                    </div>
                    <div class="mb-3">
                        <label for="namaLengkap" class="form-label">Nama Lengkap Ibu <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="namaLengkapIbu" name="namaLengkapIbu" required
                            placeholder="Masukan nama lengkap ayah">
                        <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                    </div>
                    <div class="mb-3">
                        <label for="nikAyah" class="form-label">NIK Ibu<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nikIbu" name="nikIbu" required
                            placeholder="Masukan NIK ayah" maxlength="16" pattern="\d{16}"
                            title="NIK harus 16 digit angka">
                        <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                    </div>
                    <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Status Ayah</legend>
                        <div class="col-sm-10 d-flex align-items-center gap-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Kandung
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck2">
                                <label class="form-check-label" for="gridCheck2">
                                    Tiri
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck3">
                                <label class="form-check-label" for="gridCheck3">
                                    Angkat
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Status Ibu</legend>
                        <div class="col-sm-10 d-flex align-items-center gap-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Kandung
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck2">
                                <label class="form-check-label" for="gridCheck2">
                                    Tiri
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck3">
                                <label class="form-check-label" for="gridCheck3">
                                    Angkat
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="namaLengkapAyah" class="form-label">Tempat/Tanggal Lahir Ayah <span
                                class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-2">
                                <input type="text" class="form-control" id="tempatLahirA" name="tempatLahirA"
                                    required placeholder="Masukan tempat lahir ayah">
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                <input type="date" class="form-control" id="tanggalLahirA" name="tanggalLahirA"
                                    required>
                            </div>
                        </div>
                        <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                    </div>
                    <div class="mb-3">
                        <label for="namaLengkapAyah" class="form-label">Tempat/Tanggal Lahir Ibu <span
                                class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-2">
                                <input type="text" class="form-control" id="tempatLahirI" name="tempatLahirI"
                                    required placeholder="Masukan tempat lahir ibu">
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                <input type="date" class="form-control" id="tanggalLahirI" name="tanggalLahirI"
                                    required>
                            </div>
                        </div>
                        <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                    </div>

                    <div class="mb-3">
                        <label for="namaLengkap" class="form-label">Alamat Rumah<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required
                            placeholder="Contoh : Jl. Sudirman No. 00, Kota Padang">
                        <span class="error-message"></span>
                    </div>

                    <div class="mb-3">
                        <label for="namaLengkap" class="form-label">Kode Pos<span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="kodepos" name="kodepos" required
                            placeholder="Masukan kode pos anda">
                        <span class="error-message"></span>
                    </div>

                    <div class="mb-3">
                        <label for="namaLengkap" class="form-label">Nomor Telepon<span
                                class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="notelp" name="notelp" required
                            placeholder="Contoh : 6282123456789">
                        <span class="error-message"></span>
                    </div>

                    <div class="mb-3">
                        <p class="mb-1">Kantor/Tempat Kerja</p>
                        <div class="mb-1 row">
                            <label for="kantorAyah" class="col-sm-2 col-form-label">a. Ayah <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" id="kantorAyah" name="kantorAyah"
                                    required placeholder="Jl. Sudirman, Kota Padang">
                                <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kantorIbu" class="col-sm-2 col-form-label">b. Ibu <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" id="kantorIbu" name="kantorIbu" required
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
                                <input type="tel" class="form-control" id="nohpAyah" name="nohpAyah" required
                                    placeholder="Contoh : 6282123456789">
                                <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nohpIbu" class="col-sm-2 col-form-label">b. Ibu <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" id="nohpIbu" name="nohpIbu" required
                                    placeholder="Contoh : 6282123456789">
                                <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                            </div>
                        </div>
                    </div>

                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Kawasan Tinggal</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                    value="option1">
                                <label class="form-check-label" for="gridRadios1">
                                    Perumahan/Komplek
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2"
                                    value="option2">
                                <label class="form-check-label" for="gridRadios2">
                                    Ruko
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2"
                                    value="option3">
                                <label class="form-check-label" for="gridRadios3">
                                    Perkampungan
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Status Tempat Tinggal</legend>
                        <div class="col-sm-10">

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Milik Pribadi
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck2">
                                <label class="form-check-label" for="gridCheck2">
                                    Sewa
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck2">
                                <label class="form-check-label" for="gridCheck2">
                                    Tumpangan
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="mb-3" id="inputLain" style="display: none;">
                            <input type="text" class="form-control" id="inputLainDetail" name="inputLainDetail"
                                placeholder="Masukan jawaban anda">
                            <span class="error-message"></span>
                        </div>
                    </div>


                </form><!-- End General Form Elements -->
            </div>
        </div>
    </div>

    <!--Halaman kedua-->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="row mb-3" style="padding-top: 2rem">
                        <legend class="col-form-label col-sm-2 pt-0">Pendidikan Ayah</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikanAyah"
                                    id="pendidikanAyah1" value="SD" onclick="toggleInputPendidikan()">
                                <label class="form-check-label" for="pendidikanAyah1">SD</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikanAyah"
                                    id="pendidikanAyah2" value="SMP" onclick="toggleInputPendidikan()">
                                <label class="form-check-label" for="pendidikanAyah2">SMP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikanAyah"
                                    id="pendidikanAyah3" value="SMA" onclick="toggleInputPendidikan()">
                                <label class="form-check-label" for="pendidikanAyah3">SMA</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikanAyah"
                                    id="pendidikanAyah4" value="SMA" onclick="toggleInputPendidikan()">
                                <label class="form-check-label" for="pendidikanAyah4">DIII</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikanAyah"
                                    id="pendidikanAyah5" value="SMA" onclick="toggleInputPendidikan()">
                                <label class="form-check-label" for="pendidikanAyah5">S1</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikanAyah"
                                    id="pendidikanAyah6" value="SMA" onclick="toggleInputPendidikan()">
                                <label class="form-check-label" for="pendidikanAyah6">S2</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikanAyah"
                                    id="pendidikanAyah7" value="Lain-lain" onclick="toggleInputPendidikan()">
                                <label class="form-check-label" for="pendidikanAyah7">Lain-lain, sebutkan...</label>
                            </div>
                            <input type="text" class="form-control mt-2" id="inputLainPendidikanAyah"
                                name="inputLainPendidikanAyah" placeholder="Sebutkan..." style="display:none;">
                        </div>
                    </div>

                    <div class="row mb-3" style="padding-top: 2rem">
                        <legend class="col-form-label col-sm-2 pt-0">Pendidikan Ibu</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikanIbu"
                                    id="pendidikanIbu1" value="SD" onclick="toggleInputPendidikan()">
                                <label class="form-check-label" for="pendidikanIbu1">SD</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikanIbu"
                                    id="pendidikanIbu2" value="SMP" onclick="toggleInputPendidikan()">
                                <label class="form-check-label" for="pendidikanIbu2">SMP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikanIbu"
                                    id="pendidikanIbu3" value="SMA" onclick="toggleInputPendidikan()">
                                <label class="form-check-label" for="pendidikanAyah3">SMA</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikanIbu"
                                    id="pendidikanIbu4" value="SMA" onclick="toggleInputPendidikan()">
                                <label class="form-check-label" for="pendidikanIbu4">DIII</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikanIbu"
                                    id="pendidikanIbu5" value="SMA" onclick="toggleInputPendidikan()">
                                <label class="form-check-label" for="pendidikanIbu5">S1</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikanIbu"
                                    id="pendidikanIbu6" value="SMA" onclick="toggleInputPendidikan()">
                                <label class="form-check-label" for="pendidikanIbu6">S2</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikanIbu"
                                    id="pendidikanIbu7" value="Lain-lain" onclick="toggleInputPendidikan()">
                                <label class="form-check-label" for="pendidikanIbu7">Lain-lain, sebutkan...</label>
                            </div>
                            <input type="text" class="form-control mt-2" id="inputLainPendidikanIbu"
                                name="inputLainPendidikanIbu" placeholder="Sebutkan..." style="display:none;">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="mb-1">Pekerjaan Ayah Sebagai <span class="text-danger">*</span></p>
                        <div class="col-sm-12">
                            <select class="form-select" aria-label="Default select example" id="jobSelectAyah"
                                onchange="updatePlaceholderAyah()">
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
                                placeholder="Masukan detail golongan" style="display: none;">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <p class="mb-1">Pekerjaan Ibu Sebagai <span class="text-danger">*</span></p>
                        <div class="col-sm-12">
                            <select class="form-select" aria-label="Default select example" id="jobSelectIbu"
                                onchange="updatePlaceholderIbu()">
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
                                placeholder="Masukan detail golongan" style="display: none;">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <p class="mb-1">Penghasilan Sebulan yang diperoleh Ayah<span class="text-danger">*</span>
                        </p>
                        <div class="col-sm-12">
                            <select class="form-select" aria-label="Default select example" id="penghasilan">
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
                            <select class="form-select" aria-label="Default select example" id="penghasilanIbu">
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
                            <input type="number" class="form-control" id="jumlahtanggungan" name="jumlahtanggungan"
                                required placeholder="Masukkan jumlah tanggungan"
                                style="flex-grow: 1; margin-right: 10px;">
                            <span>Orang</span>
                        </div>
                        <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                    </div>

                    <div class="mb-3">
                        <label for="dataTanggungan" class="form-label">Nama anak yang menjadi tanggungan<span
                                class="text-danger">*</span></label>
                        <div style="display: flex; align-items: center;">
                            <button type="button" class="btn btn-warning">Tambahkan data tanggungan</button>
                        </div>
                        <span class="error-message"></span> <!-- Ini untuk pesan kesalahan -->
                    </div>

                    <table class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Sekolah/Kampus</th>
                                <th scope="col">Kelas/Semster</th>
                                <th scope="col">Uang Sekolah</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">Ahmad</td>
                                <td class="text-center">SMAN 1 Padang</td>
                                <td class="text-center">X</td>
                                <td class="text-center">0</td>
                                <td class="text-center">KIP</td>
                                <td class="text-center">
                                    Edit
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Data-data dalam formulir pendaftaran ini saya isi dengan sebenar-benarnya dan sejujurnya
                            sesuai dengan keadaan yang sebenarnya untuk dipergunakan bagi perkembangan pendidikan anak
                            saya.
                        </label>
                    </div>




            </div>
            </form><!-- End General Form Elements -->
        </div>
    </div>
</div>
