@extends('layout.app')
@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="assets/img/banner.jpg" alt="" data-aos="fade-in">

            <div class="container text-center" data-aos="zoom-out" data-aos-delay="100">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2>Selamat Datang di Website <br>SD IT Permata</h2>
                        <p>Pendaftaran Siswa Baru Tahun Ajaran 2024/2025 Telah Dibuka!</p>
                        <a href="/pendaftaran" class="btn-get-started">Daftar Sekarang!</a>
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kenapa memilih SD IT Permata?</h2>

            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up">

                <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-5">
                        <div class="about-img">
                            <img src="assets/img/poster.jpg" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <h3 class="pt-0 pt-lg-5">Sekolah berbasis keislaman terpadu</h3>

                        <!-- Tabs -->
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li><a class="nav-link active" data-bs-toggle="pill" href="#about-tab1" aria-selected="true"
                                    role="tab">Guru yang berkualitas</a></li>
                            <li><a class="nav-link" data-bs-toggle="pill" href="#about-tab2" aria-selected="false"
                                    tabindex="-1" role="tab">Fasilitas Lengkap</a></li>
                            <li><a class="nav-link" data-bs-toggle="pill" href="#about-tab3" aria-selected="false"
                                    tabindex="-1" role="tab">Lingkungan Nyaman</a></li>
                        </ul><!-- End Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="about-tab1" role="tabpanel">

                                <p class="fst-italic">Kami menyediakan tenaga pendidik yang berkualitas</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Guru terbaik dibidangnya</h4>
                                </div>


                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Guru yang telah tersertifikasi</h4>
                                </div>


                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Guru yang menyajikan metode pembelajaran yang menyenangkan</h4>
                                </div>


                            </div><!-- End Tab 1 Content -->

                            <div class="tab-pane fade" id="about-tab2" role="tabpanel">

                                <p class="fst-italic">Terdapat berbagai fasilitas yang nyaman</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Ruang kelas yang bersih dan nyaman</h4>
                                </div>


                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Kantin yang bersih dan sehat</h4>
                                </div>


                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Mushola yang nyaman</h4>
                                </div>


                            </div><!-- End Tab 2 Content -->

                            <div class="tab-pane fade" id="about-tab3" role="tabpanel">

                                <p class="fst-italic">Kami menawarkan lingkungan yang nyaman untuk mendukung proses
                                    pembelajaran siswa</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Terdapat fasilitas konseling untuk pengarahan siswa</h4>
                                </div>


                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Metode pembelajaran yang asik dan menyenangkan</h4>
                                </div>


                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Lingkungan anti bullying dan kekerasan</h4>
                                </div>


                            </div><!-- End Tab 3 Content -->

                        </div>

                    </div>

                </div>

            </div>

        </section><!-- /About Section -->





    </main>
@endsection
