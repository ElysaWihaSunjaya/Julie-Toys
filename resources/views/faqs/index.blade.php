@extends('layouts.faqindex')

@section('title', 'FAQ - JULIE-TOYS')
@include('layouts.header')

@section('content')
    <div class="container my-4">
        <h2 class="mb-4">Frequently Asked Questions</h2>

        <!-- Tombol untuk menambah FAQ baru -->
        @if(auth()->user() && auth()->user()->role == 'admin')
            <a href="{{ route('faqs.create') }}" class="btn btn-primary mb-4">Tambah FAQ Baru</a>
        @endif

        @if($faqs->isEmpty())
            <p class="text-muted">Tidak ada FAQ yang tersedia. Tambahkan FAQ baru dengan menekan tombol di atas.</p>
        @else
            @foreach ($faqs as $faq)
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <strong>{{ $faq->question }}</strong>
                        <!-- Dropdown menu hanya muncul jika role user adalah admin -->
                        @if(auth()->user() && auth()->user()->role == 'admin')
                        <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $faq->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                ⋮
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $faq->id }}">
                                <li>
                                    <a class="dropdown-item" href="{{ route('faqs.edit', $faq->id) }}">Edit</a>
                                </li>
                                <li>
                                    <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus FAQ ini?')">Hapus</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <p>{{ $faq->answer }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
