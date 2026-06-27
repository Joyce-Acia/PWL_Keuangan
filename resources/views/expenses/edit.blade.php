<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit Expense') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('expenses.update', $expense) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="tanggal" value="{{ old('tanggal', $expense->tanggal) }}" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Admin</label>
                            <select name="nama_admin" class="mt-1 block w-full rounded border-gray-300" required>
                                <option value="" disabled {{ old('nama_admin', $expense->nama_admin) ? '' : 'selected' }}>Pilih nama admin</option>
                                <option value="Ratna" {{ old('nama_admin', $expense->nama_admin) === 'Ratna' ? 'selected' : '' }}>Ratna</option>
                                <option value="Dera" {{ old('nama_admin', $expense->nama_admin) === 'Dera' ? 'selected' : '' }}>Dera</option>
                                <option value="Joyce" {{ old('nama_admin', $expense->nama_admin) === 'Joyce' ? 'selected' : '' }}>Joyce</option>
                                <option value="David" {{ old('nama_admin', $expense->nama_admin) === 'David' ? 'selected' : '' }}>David</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Kategori Pengeluaran</label>
                            <select name="kategori_pengeluaran" class="mt-1 block w-full rounded border-gray-300" required>
                                <option value="" disabled {{ old('kategori_pengeluaran', $expense->kategori_pengeluaran) ? '' : 'selected' }}>Pilih kategori pengeluaran</option>
                                <option value="Pembelian Stok" {{ old('kategori_pengeluaran', $expense->kategori_pengeluaran) === 'Pembelian Stok' ? 'selected' : '' }}>Pembelian Stok</option>
                                <option value="Transportasi" {{ old('kategori_pengeluaran', $expense->kategori_pengeluaran) === 'Transportasi' ? 'selected' : '' }}>Transportasi</option>
                                <option value="Gaji/Upah" {{ old('kategori_pengeluaran', $expense->kategori_pengeluaran) === 'Gaji/Upah' ? 'selected' : '' }}>Gaji/Upah</option>
                                <option value="Perlengkapan & Marketing" {{ old('kategori_pengeluaran', $expense->kategori_pengeluaran) === 'Perlengkapan & Marketing' ? 'selected' : '' }}>Perlengkapan & Marketing</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nominal</label>
                            <input type="number" step="0.01" name="nominal" value="{{ old('nominal', $expense->nominal) }}" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea name="keterangan" class="mt-1 block w-full">{{ old('keterangan', $expense->keterangan) }}</textarea>
                        </div>

                        <div class="flex items-center gap-3">
                            <button class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">Update</button>
                            <a href="{{ route('expenses.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-md">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
