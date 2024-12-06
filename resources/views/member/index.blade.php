<!-- resources/views/members/index.blade.php -->
@extends('layouts.memberindex')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <h3 class="text-xl font-semibold mb-4">Daftar Member (Buyer)</h3>

        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buyers as $buyer)
                    <tr>
                        <td class="px-4 py-2">{{ $buyer->name }}</td>
                        <td class="px-4 py-2">{{ $buyer->email }}</td>
                        <td class="px-4 py-2">{{ $buyer->role }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
