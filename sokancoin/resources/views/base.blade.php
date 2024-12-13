<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SokanCoin')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-md shadow-md">
        <nav class="bg-blue-500 p-4 shadow-md mb-6">
            <div class="max-w-6xl mx-auto flex justify-between items-center">
                <a href="{{ route('wallets.index') }}" class="text-white text-xl font-bold">SokanCoin</a>
                <div class="space-x-6">
                    <a href="{{ route('transactions.index') }}" class="text-white hover:text-gray-200">Transactions (Admin Page)</a>
                    <a href="{{ route('wallets.index') }}" class="text-white hover:text-gray-200">Wallets</a>
                    <a href="{{ route('transactions.create') }}" class="text-white hover:text-gray-200">New Transaction</a>
                </div>
            </div>
        </nav>
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

        @yield('body')
    </div>
</body>
</html>
