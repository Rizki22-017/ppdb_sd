@extends('layout.app')
@section('content')
    <main class="main">
        <!-- Page Title -->
        @if ($errors->has('bukti_pembayaran'))
            <div class="alert alert-danger">
                {{ $errors->first('bukti_pembayaran') }}
            </div>
        @endif
        <div class="page-title light-background">
            <div class="container">
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">Upload Bukti Pembayaran</li>
                    </ol>
                </nav>
                <h1>Upload Bukti Pembayaran</h1>
            </div>
        </div>

        <!-- Proof of Payment Section -->
        <section id="proof-payment" class="section">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
                        <li class="nav-item">
                            <a class="nav-link active show" href="#" aria-disabled="true">
                                <h4>Upload Bukti Pembayaran</h4>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                    <form action="{{ route('proofPayment.post', $registration->user_id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Proof of Payment Upload Section -->
                        <div class="card mt-4">
                            <div class="card-body">
                                <h5 class="card-title">Bukti Pembayaran</h5>

                                <div class="mb-3">
                                    <label for="proof_of_payment" class="form-label">Unggah Bukti Pembayaran</label>
                                    <input type="file" class="form-control" name="bukti_pembayaran" id="proof_of_payment"
                                        accept="image/*, application/pdf" required>
                                    <small class="form-text text-muted">Format yang diterima: .jpg, .png, .pdf (Maks
                                        5MB)</small>
                                </div>

                                @if (isset($registration->proof_of_payment))
                                    <div class="mb-3">
                                        <label class="form-label">Bukti Pembayaran Sebelumnya</label>
                                        <div>
                                            <a href="{{ asset('storage/' . $registration->bukti_pembayaran) }}"
                                                target="_blank">Lihat Bukti Pembayaran</a>

                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary mt-4">Kirim Bukti Pembayaran</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
