<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-md shadow-md">
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-md border border-green-300 mb-4">
                <strong>Success:</strong> {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-4 rounded-md border border-red-300 mb-4">
                <strong>Error:</strong> {{ session('error') }}
            </div>
        @endif
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
    </div>
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-md shadow-md">
        <h1 class="text-2xl font-semibold text-center mb-6">Accepted Transactions List</h1>

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
    </div>
</body>
</html>
