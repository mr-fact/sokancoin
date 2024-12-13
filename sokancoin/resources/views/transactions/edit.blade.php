@extends('base')

@section('title', 'Edit Transaction')

@section('body')
    <h1 class="text-2xl font-semibold text-center mb-6 pt-6">{{ $transaction->originWallet->address }} -> {{ $transaction->destinationWallet->address }}</h1>

    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
            <input type="number" name="amount" id="amount" class="w-full border border-gray-300 p-2 rounded-md" min="1" value="{{ old('amount', $transaction->amount) }}">
            @error('amount')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update Transaction</button>
        </div>
    </form>
@endsection