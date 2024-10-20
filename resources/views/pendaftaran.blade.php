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



@endsection



