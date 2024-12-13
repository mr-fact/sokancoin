@extends('base')

@section('title', 'New Transaction')

@section('body')
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="origin_wallet_id" class="block text-sm font-medium text-gray-700">Origin Wallet</label>
            <select name="origin_wallet_id" id="origin_wallet_id" class="w-full border border-gray-300 p-2 rounded-md">
                <option value="">Select Origin Wallet</option>
                @foreach ($wallets as $wallet)
                    <option value="{{ $wallet->id }}">{{ $wallet->address }}</option>
                @endforeach
            </select>
            @error('origin_wallet_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="destination_wallet_id" class="block text-sm font-medium text-gray-700">Destination Wallet</label>
            <select name="destination_wallet_id" id="destination_wallet_id" class="w-full border border-gray-300 p-2 rounded-md">
                <option value="">Select Destination Wallet</option>
                @foreach ($wallets as $wallet)
                    <option value="{{ $wallet->id }}">{{ $wallet->address }}</option>
                @endforeach
            </select>
            @error('destination_wallet_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
            <input type="number" name="amount" id="amount" class="w-full border border-gray-300 p-2 rounded-md" min="1">
            @error('amount')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Create Transaction</button>
        </div>
    </form>
@endsection