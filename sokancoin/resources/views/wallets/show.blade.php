@extends('base')

@section('title', 'Wallet Info')

@section('body')
    <h1 class="text-2xl font-semibold text-center mb-6">Wallet Information</h1>
    <div class="mb-6">
        <p><strong>Address:</strong> {{ $wallet->address }}</p>
        <p><strong>Name:</strong> {{ $wallet->user->name }}</p>
        <p><strong>Created At:</strong> {{ $wallet->created_at }}</p>
        <p><strong>Balance Amount:</strong> {{ $wallet->amount }}</p>
    </div>

    <h1 class="text-2xl font-semibold text-center mb-6">Transactions List</h1>

    @if ($transactions->isEmpty())
        <p class="text-center text-gray-500">No transactions found.</p>
    @else
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Origin Wallet</th>
                    <th class="px-4 py-2 text-left">Destination Wallet</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Amount</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $transaction->id }}</td>
                        <td class="px-4 py-2">{{ $transaction->originWallet->address ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $transaction->destinationWallet->address ?? 'N/A' }}</td>
                        <td class="px-4 py-2">
                            @if ($transaction->status)
                                <span class="text-green-500">Completed</span>
                            @else
                                <span class="text-red-500">Pending</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ number_format($transaction->amount) }}</td>
                        <td class="px-4 py-2">
                            @if (!$transaction->status)
                                <a href="{{ route('transactions.edit', $transaction->id) }}">Edit</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif        
@endsection