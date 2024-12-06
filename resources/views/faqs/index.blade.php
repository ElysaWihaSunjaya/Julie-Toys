@extends('layouts.faqindex')

@section('title', 'FAQ - JULIE-TOYS')

@section('content')
    <div class="container my-4">
        <h2 class="mb-4">Frequently Asked Questions</h2>

        <!-- Tombol untuk menambah FAQ baru -->
        <a href="{{ route('faqs.create') }}" class="btn btn-primary mb-4">Tambah FAQ Baru</a>

        @foreach ($faqs as $faq)
            <div class="card mb-3">
                <div class="card-header">
                    <strong>{{ $faq->question }}</strong>
                </div>

                <div class="card-body">
                    <p>{{ $faq->answer }}</p>
                    <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-warning">Edit</a>

                    <!-- Form untuk menghapus FAQ -->
                    <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
