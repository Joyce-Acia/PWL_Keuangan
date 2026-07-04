<x-app-layout>
    <x-slot name="header">
        {{-- hidden --}}
    </x-slot>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .form-root { font-family: 'Montserrat', sans-serif; background: #fffaed; min-height: 100vh; }

        .breadcrumb {
            display: flex; align-items: center; gap: 6px;
            font-size: 0.78rem; color: #b87a3a;
            margin-bottom: 20px;
        }
        .breadcrumb a { color: #FE914D; text-decoration: none; font-weight: 600; }
        .breadcrumb a:hover { text-decoration: underline; }
        .breadcrumb-sep { color: #FEAF52; }

        .form-card {
            background: #fff;
            border-radius: 18px;
            border: 1.5px solid #FEAF52;
            overflow: hidden;
        }

        .form-card-header {
            background: #FE914D;
            padding: 18px 24px;
            display: flex; align-items: center; gap: 10px;
        }
        .form-card-header-icon {
            width: 34px; height: 34px;
            background: rgba(255,255,255,0.22);
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            color: #fff;
        }
        .form-card-title { font-size: 1rem; font-weight: 700; color: #fff; }
        .form-card-sub { font-size: 0.75rem; color: rgba(255,255,255,0.82); margin-top: 1px; }

        .form-card-body { padding: 28px 24px; }

        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        @media (max-width: 640px) { .form-grid { grid-template-columns: 1fr; } }

        .form-group { display: flex; flex-direction: column; gap: 5px; }
        .form-group.full { grid-column: 1 / -1; }
        @media (max-width: 640px) { .form-group.full { grid-column: span 1; } }

        .form-label {
            font-size: 0.7rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.05em;
            color: #FE914D;
        }
        .form-label span { color: #FD593D; margin-left: 2px; }

        .form-input, .form-select, .form-textarea {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.875rem; color: #3a2a18;
            background: #FFFAED;
            border: 1.5px solid #FEAF52;
            border-radius: 10px;
            padding: 10px 13px;
            width: 100%; outline: none;
            transition: border-color 0.15s, background 0.15s, box-shadow 0.15s;
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: #FF941D;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(255,148,29,0.15);
        }
        .form-input.nominal {
            font-weight: 700; font-size: 1rem;
            color: #FD593D; padding-left: 34px;
        }
        .form-textarea { resize: vertical; min-height: 88px; }

        .input-prefix-wrap { position: relative; }
        .input-prefix {
            position: absolute; left: 12px; top: 50%;
            transform: translateY(-50%);
            font-weight: 700; font-size: 0.82rem;
            color: #FEAF52; pointer-events: none;
        }

        .form-divider {
            grid-column: 1 / -1;
            border: none; border-top: 1.5px dashed #FFF2CC;
            margin: 4px 0;
        }
        @media (max-width: 640px) { .form-divider { grid-column: span 1; } }

        .alert-error {
            margin-bottom: 20px; padding: 12px 16px;
            background: rgba(253,89,61,0.08); border: 1px solid rgba(253,89,61,0.3);
            color: #FD593D; border-radius: 10px; font-size: 0.84rem;
        }
        .alert-error ul { list-style: disc; padding-left: 16px; margin-top: 4px; }
        .field-error { font-size: 0.72rem; color: #FD593D; margin-top: 3px; }
        .form-input.err, .form-select.err, .form-textarea.err { border-color: #FD593D; background: #fff5f5; }

        .form-card-footer {
            padding: 16px 24px;
            background: #FFF2CC;
            border-top: 1.5px solid #FEAF52;
            display: flex; align-items: center;
            justify-content: space-between; gap: 12px;
            flex-wrap: wrap;
        }
        .footer-hint { font-size: 0.75rem; color: #b87a3a; }
        .footer-actions { display: flex; gap: 10px; }

        .btn-cancel {
            display: inline-flex; align-items: center; gap: 6px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.82rem; font-weight: 700;
            padding: 9px 18px; border-radius: 10px;
            background: #fff; border: 1.5px solid #FEAF52;
            color: #b87a3a; text-decoration: none;
            transition: background 0.15s, color 0.15s;
        }
        .btn-cancel:hover { background: #FEAF52; color: #fff; }

        .btn-save {
            display: inline-flex; align-items: center; gap: 6px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.82rem; font-weight: 700;
            padding: 9px 22px; border-radius: 10px;
            background: #FD593D; border: none;
            color: #fff; cursor: pointer;
            transition: background 0.15s;
        }
        .btn-save:hover { background: #e04428; }
    </style>

    <div class="form-root py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">

            <div class="breadcrumb">
                <a href="{{ route('expenses.index') }}">Transaksi Expenses</a>
                <span class="breadcrumb-sep">›</span>
                <span>Tambah Expense</span>
            </div>

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

                <div class="form-card-header">
                    <div class="form-card-header-icon">
                        <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <path d="M12 5v14M5 12h14"/>
                        </svg>
                    </div>
                    <div>
                        <div class="form-card-title">Tambah Expense</div>
                        <div class="form-card-sub">Catat transaksi pengeluaran baru</div>
                    </div>
                </div>

                <div class="form-card-body">
                    <form method="POST" action="{{ route('expenses.store') }}" id="expense-form">
                        @csrf

                        <input type="hidden" name="id_transaksi" value="{{ old('id_transaksi') }}">

                        <div class="form-grid">

                            <div class="form-group">
                                <label class="form-label" for="tanggal">Tanggal <span>*</span></label>
                                <input
                                    type="date" id="tanggal" name="tanggal"
                                    value="{{ old('tanggal', date('Y-m-d')) }}"
                                    class="form-input {{ $errors->has('tanggal') ? 'err' : '' }}"
                                    required>
                                @error('tanggal')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="nama_admin">Nama Admin <span>*</span></label>
                                <select
                                    id="nama_admin" name="nama_admin"
                                    class="form-select {{ $errors->has('nama_admin') ? 'err' : '' }}"
                                    required>
                                    <option value="">— Pilih Nama Admin —</option>
                                    @foreach(['Ratna','Dera','Joyce','David'] as $option)
                                        <option value="{{ $option }}" {{ old('nama_admin') === $option ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('nama_admin')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <hr class="form-divider">

                            <div class="form-group full">
                                <label class="form-label" for="kategori_pengeluaran">Kategori Pengeluaran <span>*</span></label>
                                <select
                                    id="kategori_pengeluaran" name="kategori_pengeluaran"
                                    class="form-select {{ $errors->has('kategori_pengeluaran') ? 'err' : '' }}"
                                    required>
                                    <option value="">— Pilih Kategori —</option>
                                    @foreach(['Pembelian Stok','Transportasi','Gaji/Upah','Perlengkapan & Marketing'] as $option)
                                        <option value="{{ $option }}" {{ old('kategori_pengeluaran') === $option ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kategori_pengeluaran')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <hr class="form-divider">

                            <div class="form-group full">
                                <label class="form-label" for="nominal">Nominal <span>*</span></label>
                                <div class="input-prefix-wrap">
                                    <span class="input-prefix">Rp</span>
                                    <input
                                        type="number" step="1" id="nominal" name="nominal"
                                        value="{{ old('nominal') }}"
                                        placeholder="0"
                                        class="form-input nominal {{ $errors->has('nominal') ? 'err' : '' }}"
                                        required>
                                </div>
                                @error('nominal')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <hr class="form-divider">

                            <div class="form-group full">
                                <label class="form-label" for="keterangan">Keterangan <span style="color:#b87a3a;font-weight:400;text-transform:none;">(opsional)</span></label>
                                <textarea
                                    id="keterangan" name="keterangan"
                                    placeholder="Catatan singkat tentang transaksi ini..."
                                    class="form-textarea {{ $errors->has('keterangan') ? 'err' : '' }}">{{ old('keterangan') }}</textarea>
                                @error('keterangan')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                        </div>

                        <div class="form-card-footer" style="margin: 24px -24px -28px; border-radius: 0 0 16px 16px;">
                            <span class="footer-hint">Field bertanda <span style="color:#FD593D;font-weight:700;">*</span> wajib diisi.</span>
                            <div class="footer-actions">
                                <a href="{{ route('expenses.index') }}" class="btn-cancel">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
                                    Batal
                                </a>
                                <button type="submit" class="btn-save">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                                    Simpan Expense
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
