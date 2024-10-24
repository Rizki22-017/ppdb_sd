<div class="row">
    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Wali</h5>
                <div class="mb-3">
                    <label for="" class="form-label">Nama Wali</label>
                    <input type="text" class="form-control" name="nama_wali" placeholder="Masukkan Nama Wali" />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir_wali"
                        placeholder="Masukkan Tempat Lahir" />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir_wali" />
                </div>


                <div class="mb-3">
                    <label for="pendidikan_wali" class="form-label">Pendidikan Terakhir Wali<span
                            class="text-danger">*</span></label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_wali" id="sd"
                                    value="SD">
                                <label class="form-check-label" for="sd">SD</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_wali" id="smp"
                                    value="SMP">
                                <label class="form-check-label" for="smp">SMP</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_wali" id="sma"
                                    value="SMA">
                                <label class="form-check-label" for="sma">SMA</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_wali" id="d3"
                                    value="D3">
                                <label class="form-check-label" for="d3">D III</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_wali" id="s1"
                                    value="S1">
                                <label class="form-check-label" for="S1">S1</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_wali" id="s2"
                                    value="S2">
                                <label class="form-check-label" for="S2">S2</label>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_wali_lain"
                                    id="pendidikan_wali_lain" value="Lain-lain">
                                <label class="form-check-label" for="pendidikan_wali_lain">Lain-lain</label>
                            </div>
                        </div>
                    </div>

                    <!-- Input teks yang akan muncul jika 'Lain-lain' dipilih -->
                    <div id="inputLainLainpendidikan_wali" class="mt-3" style="display:none;">
                        <label for="pendidikan_wali_lain" class="form-label">Masukkan Pendidikan Lain</label>
                        <input type="text" class="form-control" id="pendidikan_wali_lain" name="pendidikan_wali_lain"
                            placeholder="Masukkan pendidikan lain">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="pendidikan_wali" class="form-label">Hubungan Kekeluargaan Dengan Murid<span
                            class="text-danger">*</span></label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hubungan_murid_wali"
                                    id="paman" value="Paman">
                                <label class="form-check-label" for="paman">Sebagai Paman</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hubungan_murid_wali"
                                    id="bibi" value="Bibi">
                                <label class="form-check-label" for="bibi">Sebagai Bibi</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hubungan_murid_wali"
                                    id="hubungan_murid_wali_lain" value="Lain-lain">
                                <label class="form-check-label" for="hubungan_murid_wali_lain">Lain-lain</label>
                            </div>
                        </div>
                    </div>

                    <!-- Input teks yang akan muncul jika 'Lain-lain' dipilih -->
                    <div id="inputLainLainMuridWali" class="mt-3" style="display:none;">
                        <label for="hubungan_murid_wali_lain" class="form-label">Lain-lain, sebutkan:</label>
                        <input type="text" class="form-control" id="hubungan_murid_wali_lain"
                            name="hubungan_murid_wali_lain" placeholder="Masukkan hubungan lain">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tanggungan_wali" class="form-label">Tanggungan terhadap murid dalam bentuk<span
                            class="text-danger">*</span></label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tanggungan_wali"
                                    id="uangSekolah" value="Menanggung Uang Sekokah">
                                <label class="form-check-label" for="uangSekolah">Menanggung Uang Sekolah</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tanggungan_wali" id="buku"
                                    value="Menanggung Buku-buku">
                                <label class="form-check-label" for="buku">Menanggung Buku-buku</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tanggungan_wali" id="penginapan"
                                    value="Menanggung Penginapan">
                                <label class="form-check-label" for="penginapan">Menanggung Penginapan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tanggungan_wali"
                                    id="tanggungan_wali_lain" value="Lain-lain">
                                <label class="form-check-label" for="tanggungan_wali_lain">Lain-lain</label>
                            </div>
                        </div>
                    </div>

                    <!-- Input teks yang akan muncul jika 'Lain-lain' dipilih -->
                    <div id="input_hubungan_wali_lain" class="mt-3" style="display:none;">
                        <label for="tanggungan_wali_lain" class="form-label">Lain-lain, sebutkan:</label>
                        <input type="text" class="form-control" id="tanggungan_wali_lain" name="tanggungan_wali_lain"
                            placeholder="Masukkan tanggungan lain">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Halaman kedua-->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <h6 class="card-title" for="alamat_wali">Alamat Wali</h6>
                    <div class="container">

                        <div class="mb-3">
                            <label for="" class="form-label">Rumah</label>
                            <input type="text" class="form-control" id="" name="alamat_wali"
                                rows="3" placeholder="Masukkan Alamat Rumah"></input>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Kode POS</label>
                            <input type="number" class="form-control" id="" name="kodepos_wali" rows="3"
                                placeholder="Masukkan Kode POS"></input>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nomor Telepon</label>
                            <input type="number" class="form-control" id="telepon_wali" name="telepon_wali" rows="3"
                                placeholder="Masukkan Nomor Telepon"></input>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Alamat Kantor/Tempat Kerja</label>
                            <input type="text" class="form-control" id="alamat_kantor_wali" name="alamat_kantor_wali" rows="3"
                                placeholder="Masukkan Alamat Kantor/Tempat Kerja"></input>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>