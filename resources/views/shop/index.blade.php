<!-- resources/views/shop/index.blade.php -->

@extends('layouts.shop') <!-- Tetap menggunakan layout -->

@section('title', 'Belanja Online') <!-- Tetap sama -->

@section('content')
    <h2 class="mb-4">Belanja Online</h2>

    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                                    <img
                        src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default.jpg') }}"
                        class="card-img-top"
                        alt="{{ $product->name }}">
                            <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Rp. {{ number_format($product->price, 2, ',', '.') }}</p>
                    <p class="card-text">
                        Rating:
                        @if ($product->average_rating)
                        <div class="rating">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="star {{ $i < $product->average_rating ? 'filled' : '' }}"></span>
                            @endfor
                        </div>
                    @else
                        Belum ada penilaian
                    @endif
                    </p>
                    <a href="{{ route('shop.show', $product->id) }}" class="btn btn-primary">Lihat Detail</a>
                    @if(auth()->user() && auth()->user()->role == 'admin')
                    <a href="{{ route('shop.edit', $product->id) }}" class="btn btn-warning ml-2">Edit</a>
                @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

