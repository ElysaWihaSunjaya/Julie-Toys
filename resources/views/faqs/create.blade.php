@extends('layouts.createfaq')

@section('title', 'Tambah FAQ - JULIE-TOYS')
@include('layouts.header')
@section('content')
    <h2 class="mb-4">Tambah FAQ Baru</h2>

    <form action="{{ route('faqs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="question">Pertanyaan</label>
            <input type="text" class="form-control" id="question" name="question" required>
        </div>
        <div class="form-group">
            <label for="answer">Jawaban</label>
            <textarea class="form-control" id="answer" name="answer" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan FAQ</button>
    </form>
@endsection
