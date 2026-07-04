<x-app-layout>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .edit-root { font-family: 'Montserrat', sans-serif; background: #fffaed; min-height: 100vh; }

        .breadcrumb {
            display: flex; align-items: center; gap: 6px;
            font-size: 0.78rem; color: #b87a3a;
            margin-bottom: 20px;
        }
        .breadcrumb a { color: #FE914D; text-decoration: none; font-weight: 600; }
        .breadcrumb a:hover { text-decoration: underline; }
        .breadcrumb-sep { color: #FEAF52; }

        .edit-card {
            background: #fff;
            border-radius: 18px;
            border: 1.5px solid #FEAF52;
            overflow: hidden;
        }

        .edit-card-header {
            background: #FE914D;
            padding: 18px 24px;
            display: flex; align-items: center; gap: 10px;
        }
        .edit-card-header-icon {
            width: 34px; height: 34px;
            background: rgba(255,255,255,0.22);
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 17px;
        }
        .edit-card-title {
            font-size: 1rem; font-weight: 700; color: #fff;
        }
        .edit-card-sub {
            font-size: 0.75rem; color: rgba(255,255,255,0.8); margin-top: 1px;
        }

        .edit-card-body { padding: 28px 24px; }

        .id-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: #FFF2CC; border: 1px solid #FEAF52;
            color: #FE914D; font-size: 0.75rem; font-weight: 700;
            padding: 5px 12px; border-radius: 8px;
            margin-bottom: 24px;
            font-family: monospace;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }
        .form-group { display: flex; flex-direction: column; gap: 5px; }
        .form-group.full { grid-column: 1 / -1; }

        .form-label {
            font-size: 0.72rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.05em;
            color: #FE914D;
        }

        .form-input,
        .form-select,
        .form-textarea {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.875rem; color: #3a2a18;
            background: #FFFAED;
            border: 1.5px solid #FEAF52;
            border-radius: 10px;
            padding: 10px 13px;
            width: 100%;
            outline: none;
            transition: border-color 0.15s, background 0.15s, box-shadow 0.15s;
        }
        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: #FF941D;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(255,148,29,0.15);
        }
        .form-input.nominal {
            font-weight: 700; font-size: 1rem; color: #FD593D;
        }
        .form-textarea { resize: vertical; min-height: 80px; }

        .input-prefix-wrap { position: relative; }
        .input-prefix {
            position: absolute; left: 13px; top: 50%;
            transform: translateY(-50%);
            font-weight: 700; font-size: 0.875rem; color: #FEAF52;
            pointer-events: none;
        }
        .form-input.with-prefix { padding-left: 34px; }

        .form-divider {
            grid-column: 1 / -1;
            border: none; border-top: 1.5px dashed #FFF2CC;
            margin: 4px 0;
        }

        .edit-card-footer {
            padding: 18px 24px;
            background: #FFF2CC;
            border-top: 1.5px solid #FEAF52;
            display: flex; align-items: center;
            justify-content: space-between; gap: 12px;
            flex-wrap: wrap;
        }
        .footer-hint {
            font-size: 0.75rem; color: #b87a3a;
        }
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
            padding: 9px 20px; border-radius: 10px;
            background: #FD593D; border: none;
            color: #fff; cursor: pointer;
            transition: background 0.15s;
        }
        .btn-save:hover { background: #e04428; }

        .field-error {
            font-size: 0.72rem; color: #FD593D;
            margin-top: 3px;
        }
        .form-input.error,
        .form-select.error,
        .form-textarea.error {
            border-color: #FD593D;
            background: #fff5f5;
        }
    </style>

    <div class="edit-root py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">

            <div class="breadcrumb">
                <a href="{{ route('expenses.index') }}">Transaksi Expenses</a>
                <span class="breadcrumb-sep">›</span>
                <span>Edit</span>
            </div>

            <div class="edit-card">

                <div class="edit-card-header">
                    <div class="edit-card-header-icon">
                        <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="edit-card-title">Edit Expense</div>
                        <div class="edit-card-sub">Perbarui data transaksi pengeluaran</div>
                    </div>
                </div>

                <div class="edit-card-body">

                    <div class="id-badge">
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="3"/><path d="M9 9h6M9 12h6M9 15h4"/></svg>
                        {{ 'EXP-' . str_pad((string) $expense->id, 6, '0', STR_PAD_LEFT) }}
                    </div>

                    <form method="POST" action="{{ route('expenses.update', $expense) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-grid">

                            <div class="form-group">
                                <label class="form-label" for="tanggal">Tanggal</label>
                                <input
                                    type="date" id="tanggal" name="tanggal"
                                    value="{{ old('tanggal', $expense->tanggal) }}"
                                    class="form-input {{ $errors->has('tanggal') ? 'error' : '' }}"
                                    required>
                                @error('tanggal')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="nama_admin">Nama Admin</label>
                                <select
                                    id="nama_admin" name="nama_admin"
                                    class="form-select {{ $errors->has('nama_admin') ? 'error' : '' }}"
                                    required>
                                    <option value="">— Pilih Nama Admin —</option>
                                    @foreach(['Ratna','Dera','Joyce','David'] as $option)
                                        <option value="{{ $option }}" {{ old('nama_admin', $expense->nama_admin) === $option ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('nama_admin')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="kategori_pengeluaran">Kategori Pengeluaran</label>
                                <select
                                    id="kategori_pengeluaran" name="kategori_pengeluaran"
                                    class="form-select {{ $errors->has('kategori_pengeluaran') ? 'error' : '' }}"
                                    required>
                                    <option value="">— Pilih Kategori —</option>
                                    @foreach(['Pembelian Stok','Transportasi','Gaji/Upah','Perlengkapan & Marketing'] as $option)
                                        <option value="{{ $option }}" {{ old('kategori_pengeluaran', $expense->kategori_pengeluaran) === $option ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kategori_pengeluaran')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="nominal">Nominal</label>
                                <div class="input-prefix-wrap">
                                    <span class="input-prefix">Rp</span>
                                    <input
                                        type="number" step="1" id="nominal" name="nominal"
                                        value="{{ old('nominal', $expense->nominal) }}"
                                        placeholder="0"
                                        class="form-input nominal with-prefix {{ $errors->has('nominal') ? 'error' : '' }}"
                                        required>
                                </div>
                                @error('nominal')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <hr class="form-divider">

                            <div class="form-group full">
                                <label class="form-label" for="keterangan">Keterangan</label>
                                <textarea
                                    id="keterangan" name="keterangan"
                                    placeholder="Catatan singkat tentang transaksi ini..."
                                    class="form-textarea {{ $errors->has('keterangan') ? 'error' : '' }}">{{ old('keterangan', $expense->keterangan) }}</textarea>
                                @error('keterangan')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                        </div>

                        <div class="edit-card-footer" style="margin: 24px -24px -28px; border-radius: 0 0 16px 16px;">
                            <span class="footer-hint">Pastikan semua data sudah benar sebelum disimpan.</span>
                            <div class="footer-actions">
                                <a href="{{ route('expenses.index') }}" class="btn-cancel">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
                                    Batal
                                </a>
                                <button type="submit" class="btn-save">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
