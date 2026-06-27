<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold mx-2 text-xl text-gray-800 leading-tight">{{ __('Edit Income') }}</h2>
    </x-slot>

    <div class="py-2 bg-[#FFF2CC]">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <form method="POST" action="{{ route('income.update', $income) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="tanggal" value="{{ old('tanggal', $income->tanggal) }}" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan', $income->nama_pelanggan) }}" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Sumber</label>
                            <select name="sumber" class="mt-1 block w-full" required>
                                <option value="">-- Pilih Sumber --</option>
                                @foreach([
                                    'Penjualan Utama',
                                    'Modal',
                                    'Donasi atau Sponsor',
                                    'Lain-lain'
                                ] as $option)
                                    <option value="{{ $option }}" {{ old('sumber', $income->sumber) === $option ? 'selected' : '' }}>
                                        {{ $option }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nominal</label>
                            <input type="number" step="0.01" name="nominal" value="{{ old('nominal', $income->nominal) }}" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea name="keterangan" class="mt-1 block w-full">{{ old('keterangan', $income->keterangan) }}</textarea>
                        </div>

                        <div class="flex items-center gap-3">
                            <button class="inline-flex items-center px-4 py-2 bg-[#fd593d] text-white rounded-md hover:bg-[#feaf52]">Update</button>
                            <a href="{{ route('income.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>
