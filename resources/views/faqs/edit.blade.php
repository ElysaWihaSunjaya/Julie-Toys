@extends('layouts.faqedit')

@section('title', 'Edit FAQ - JULIE-TOYS')
@include('layouts.header')
@section('content')
    <h2 class="mb-4">Edit FAQ</h2>

    <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="question">Pertanyaan</label>
            <input type="text" class="form-control" id="question" name="question" value="{{ $faq->question }}" required>
        </div>
        <div class="form-group">
            <label for="answer">Jawaban</label>
            <textarea class="form-control" id="answer" name="answer" rows="4" required>{{ $faq->answer }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update FAQ</button>
    </form>
@endsection
