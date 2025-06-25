@extends('master')
@section('content')
    <div class="header">
        <h1 class="header-title">
            Bitcoin Treasuries
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Bitcoin Treasuries</a></li>
                <li class="breadcrumb-item active" aria-current="page">Education</li>
            </ol>
        </nav>
    </div>

    <div class="row" id="videoList">
        @foreach ($videos as $index => $video)
            <div class="col-md-6 mb-4 video-item">
                <div class="card shadow-lg border-0 custom-card">
                    <div class="card-header text-white bg-gradient-primary d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-white">Video #{{ $index + 1 }} - {{ $video->nama_modul }}</h5>
                        <span class="badge bg-light text-dark">{{ $video->status === 'Locked' ? 'Locked' : 'Available' }}</span>
                    </div>
                    <div class="card-body">
                        @if ($video->status === 'Locked')
                            <div class="position-relative" style="height: 315px; background-color: #000;">
                                <div class="d-flex justify-content-center align-items-center h-100 text-white bg-dark bg-opacity-75 position-absolute w-100 h-100">
                                    <div class="text-center">
                                        <i class="fas fa-lock fa-2x mb-2"></i>
                                        <p>Video Locked</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="ratio ratio-16x9 mb-3">
                                <iframe src="{{ $video->video }}" frameborder="0" allowfullscreen></iframe>
                            </div>
                        @endif
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ $video->status === 'Locked' ? '#' : $video->video }}" target="_blank" class="btn btn-outline-primary btn-sm {{ $video->status === 'Locked' ? 'disabled' : '' }}">Watch</a>
                            <small class="text-muted">Status: {{ $video->status === 'Locked' ? 'Restricted' : 'Open' }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- STYLE --}}
    <style>
        .custom-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border-radius: 10px;
            overflow: hidden;
        }

        .custom-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
        }

        .btn-outline-primary {
            transition: all 0.3s ease-in-out;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }

        .ratio {
            border-radius: 8px;
            overflow: hidden;
        }
    </style>
@endsection
