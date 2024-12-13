@extends('base')

@section('title', 'Transactions')

@section('body')
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
                            <form action="{{ route('transactions.delete', $transaction->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                            /
                            <form action="{{ route('transactions.accept', $transaction->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-green-500 hover:underline">Accept</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <h1 class="text-2xl font-semibold text-center mb-6 pt-6">Accepted Transactions List</h1>

    @if ($accepted_transactions->isEmpty())
        <p class="text-center text-gray-500">No accepted transactions found.</p>
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
                @foreach ($accepted_transactions as $transaction)
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
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection