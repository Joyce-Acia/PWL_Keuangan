<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Create Expense') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('expenses.store') }}">
                        @csrf

                        @if($errors->any())
                            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                                <ul class="list-disc list-inside">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <input type="hidden" name="transaction_id" value="{{ old('transaction_id') }}">


                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Admin</label>
                            <select name="nama_admin" class="mt-1 block w-full rounded border-gray-300" required>
                                <option value="" disabled {{ old('nama_admin') ? '' : 'selected' }}>Pilih nama admin</option>
                                <option value="Ratna" {{ old('nama_admin') === 'Ratna' ? 'selected' : '' }}>Ratna</option>
                                <option value="Dera" {{ old('nama_admin') === 'Dera' ? 'selected' : '' }}>Dera</option>
                                <option value="Joyce" {{ old('nama_admin') === 'Joyce' ? 'selected' : '' }}>Joyce</option>
                                <option value="David" {{ old('nama_admin') === 'David' ? 'selected' : '' }}>David</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Kategori Pengeluaran</label>
                            <input type="text" name="kategori_pengeluaran" value="{{ old('kategori_pengeluaran') }}" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nominal</label>
                            <input type="number" step="0.01" name="nominal" value="{{ old('nominal') }}" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea name="keterangan" class="mt-1 block w-full">{{ old('keterangan') }}</textarea>
                        </div>

                        <div>
                            <button class="inline-flex items-left px-4 py-2 bg-indigo-600 text-black rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
