<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit Expense Lain-Lain') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('expense-lain-lain.update', $expenseLainLain) }}">
                        @csrf
                        @method('PUT')

                        @if($errors->any())
                            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                                <ul class="list-disc list-inside">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">ID Transaksi</label>
                            <input type="text" name="transaction_id" value="{{ $expenseLainLain->transaction_id }}" class="mt-1 block w-full" required readonly>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="tanggal" value="{{ $expenseLainLain->tanggal->format('Y-m-d') }}" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Admin</label>
                            <select name="nama_admin" class="mt-1 block w-full rounded border-gray-300" required>
                                <option value="Ratna" {{ $expenseLainLain->nama_admin === 'Ratna' ? 'selected' : '' }}>Ratna</option>
                                <option value="Dera" {{ $expenseLainLain->nama_admin === 'Dera' ? 'selected' : '' }}>Dera</option>
                                <option value="Joyce" {{ $expenseLainLain->nama_admin === 'Joyce' ? 'selected' : '' }}>Joyce</option>
                                <option value="David" {{ $expenseLainLain->nama_admin === 'David' ? 'selected' : '' }}>David</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea name="keterangan" class="mt-1 block w-full">{{ $expenseLainLain->keterangan }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Harga</label>
                            <input type="number" step="0.01" name="harga" id="harga" value="{{ $expenseLainLain->harga }}" class="mt-1 block w-full" required onchange="calculateTotal()">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Kuantiti</label>
                            <input type="number" name="kuantiti" id="kuantiti" value="{{ $expenseLainLain->kuantiti }}" class="mt-1 block w-full" required onchange="calculateTotal()">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Total</label>
                            <input type="number" step="0.01" name="total" id="total" value="{{ $expenseLainLain->total }}" class="mt-1 block w-full" required readonly>
                        </div>

                        <div>
                            <button class="inline-flex items-left px-4 py-2 bg-indigo-600 text-black rounded">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function calculateTotal() {
            const harga = parseFloat(document.getElementById('harga').value) || 0;
            const kuantiti = parseInt(document.getElementById('kuantiti').value) || 0;
            const total = harga * kuantiti;
            document.getElementById('total').value = total.toFixed(2);
        }
    </script>
</x-app-layout>
