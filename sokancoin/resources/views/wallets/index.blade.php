@extends('base')

@section('title', 'Wallets')

@section('body')
    <h1 class="text-2xl font-semibold text-center mb-6">Wallets List</h1>

    @if ($wallets->isEmpty())
        <p class="text-center text-gray-500">No wallet found.</p>
    @else
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-4 py-2 text-left">address</th>
                    <th class="px-4 py-2 text-left">name</th>
                    <th class="px-4 py-2 text-left">created at</th>
                    <th class="px-4 py-2 text-left">Amount</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wallets as $wallet)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $wallet->address }}</td>
                        <td class="px-4 py-2">{{ $wallet->user->name }}</td>
                        <td class="px-4 py-2">{{ $wallet->created_at }}</td>
                        <td class="px-4 py-2">{{ $wallet->amount }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('wallets.show', $wallet->address) }}">Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection