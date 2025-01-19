<!-- resources/views/members/index.blade.php -->
@extends('layouts.memberindex')
@include('layouts.header')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <h3 class="text-xl font-semibold mb-4">Daftar Member (Buyer)</h3>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buyers as $buyer)
                        <tr>
                            <td>{{ $buyer->name }}</td>
                            <td>{{ $buyer->email }}</td>
                            <td>{{ $buyer->role }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($buyers->isEmpty())
            <div class="alert alert-warning mt-4" role="alert">
                Tidak ada data member (buyer) yang tersedia.
            </div>
        @endif
    </div>
@endsection
