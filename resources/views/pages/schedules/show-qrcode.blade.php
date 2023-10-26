@extends('layouts.app')

@section('title', 'Qr Code')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Qr Code Absensi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Qr Code Absensi</a></div>
                    <div class="breadcrumb-item">Show Qr Code</div>
                </div>
            </div>

                <div class="visible-print text-center">
                    {!! QrCode::size(150)->generate($code); !!}
                    <p>Scan me to absen.</p>
                </div>
            <div class="section-body">

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
