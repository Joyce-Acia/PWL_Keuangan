<x-app-layout>
    <x-slot name="header">
        {{-- hidden --}}
    </x-slot>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .form-root { font-family: 'Montserrat', sans-serif; }

        .form-card {
            background: #fff;
            border-radius: 20px;
            border: 1px solid #f0f0f0;
            padding: 32px;
        }

        .form-page-title { font-size: 1.2rem; font-weight: 700; color: #111827; margin-bottom: 4px; }
        .form-page-sub   { font-size: 0.8rem; color: #9ca3af; margin-bottom: 28px; }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }
        @media (max-width: 640px) { .form-grid { grid-template-columns: 1fr; } }

        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group.full { grid-column: span 2; }
        @media (max-width: 640px) { .form-group.full { grid-column: span 1; } }

        .form-label {
            font-size: 0.78rem; font-weight: 600;
            color: #374151; letter-spacing: 0.01em;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%; padding: 10px 13px;
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            font-size: 0.875rem; color: #111827;
            font-family: 'Montserrat', sans-serif;
            background: #fff;
            transition: border-color 0.15s, box-shadow 0.15s;
            outline: none;
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: #ff6a2f;
            box-shadow: 0 0 0 3px rgba(255,106,47,0.1);
        }
        .form-input.readonly-field {
            background: #fafafa; color: #6b7280;
            cursor: default; border-style: dashed;
        }
        .form-textarea { resize: vertical; min-height: 88px; }

        .total-hint {
            font-size: 0.72rem; color: #9ca3af; margin-top: 4px;
        }

        .alert-error {
            margin-bottom: 20px; padding: 12px 16px;
            background: #fff1f0; border: 1px solid #fecaca;
            color: #b91c1c; border-radius: 10px; font-size: 0.84rem;
        }
        .alert-error ul { list-style: disc; padding-left: 16px; margin-top: 4px; }

        .divider { grid-column: span 2; border: none; border-top: 1px solid #f3f4f6; margin: 4px 0; }
        @media (max-width: 640px) { .divider { grid-column: span 1; } }

        .form-footer { display: flex; justify-content: flex-end; gap: 10px; margin-top: 24px; }

        .btn-cancel {
            padding: 10px 20px; border-radius: 10px;
            font-size: 0.85rem; font-weight: 600;
            border: 1.5px solid #e5e7eb; color: #6b7280;
            background: #fff; text-decoration: none;
            transition: background 0.15s;
        }
        .btn-cancel:hover { background: #f9fafb; }

        .btn-save {
            padding: 10px 24px; border-radius: 10px;
            font-size: 0.85rem; font-weight: 600;
            background: linear-gradient(to right, #ff4336, #ff941d);
            color: #fff; border: none; cursor: pointer;
            transition: opacity 0.2s;
        }
        .btn-save:hover { opacity: 0.88; }
    </style>

    <div class="form-root py-8 px-4 sm:px-8">
        <div class="max-w-3xl mx-auto">

            @if($errors->any())
                <div class="alert-error">
                    <strong>Periksa kembali form:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-card">
                <div class="form-page-title">Create Income</div>
                <div class="form-page-sub">Tambah transaksi pemasukan baru</div>

                <form method="POST" action="{{ route('income.store') }}">
                    @csrf

                    <div class="form-grid">

                        {{-- Tanggal --}}
                        <div class="form-group">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="form-input" required>
                        </div>

                        {{-- Nama Pelanggan --}}
                        <div class="form-group">
                            <label class="form-label">Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" class="form-input" placeholder="Contoh: Budi Santoso" required>
                        </div>

                        {{-- Sumber (moved above Kuantitas) --}}
                        <div class="form-group full">
                            <label class="form-label">Sumber</label>
                            <select name="sumber" class="form-select" required>
                                <option value="">-- Pilih Sumber --</option>
                                @foreach([
                                    'Penjualan Utama',
                                    'Modal',
                                    'Donasi atau Sponsor',
                                    'Lain-lain'
                                ] as $stok)
                                    <option value="{{ $stok }}" {{ old('sumber') === $stok ? 'selected' : '' }}>
                                        {{ $stok }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <hr class="divider">

                        <div class="form-group full">
                            <label class="form-label">Nominal (Rp)</label>
                            <input type="number" step="0.01" name="nominal" value="{{ old('nominal') }}" class="form-input" placeholder="0" required>
                        </div>

                        <hr class="divider">

                        {{-- Keterangan --}}
                        <div class="form-group full">
                            <label class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-textarea"
                                      placeholder="Catatan tambahan (opsional)...">{{ old('keterangan') }}</textarea>
                        </div>

                    </div>

                    <div class="form-footer">
                        <a href="{{ route('income.index') }}" class="btn-cancel">Batal</a>
                        <button type="submit" class="btn-save">Simpan</button>
                    </div>

                </form>
            </div>

        </div>
    </div>


</x-app-layout>