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

        .input-suffix-wrap {
            position: relative;
        }

        .input-suffix {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-weight: 700;
            color: #FEAF52;
            pointer-events: none;
        }

        .form-input.with-suffix {
            padding-right: 32px;
        }

        .form-divider {
            grid-column: 1 / -1;
            border: none; border-top: 1.5px dashed #FFF2CC;
            margin: 4px 0;
        }
        @media (max-width: 640px) { .form-divider { grid-column: span 1; } }

        .sumber-pills {
            display: flex; flex-wrap: wrap; gap: 8px;
            margin-top: 2px;
        }
        .sumber-pill input[type="radio"] { display: none; }
        .sumber-pill label {
            display: inline-block;
            font-size: 0.78rem; font-weight: 600;
            padding: 6px 14px; border-radius: 20px;
            border: 1.5px solid #FEAF52;
            background: #FFF2CC; color: #b87a3a;
            cursor: pointer;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
        }
        .sumber-pill input[type="radio"]:checked + label {
            background: #FF941D; border-color: #FF941D; color: #fff;
        }
        .sumber-pill label:hover { background: #FEAF52; color: #fff; border-color: #FEAF52; }

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
                <a href="{{ route('income.index') }}">Transaksi Incomes</a>
                <span class="breadcrumb-sep">›</span>
                <span>Tambah Income</span>
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
                        <div class="form-card-title">Tambah Income</div>
                        <div class="form-card-sub">Catat transaksi pemasukan baru</div>
                    </div>
                </div>

                <div class="form-card-body">
                    <form method="POST" action="{{ route('income.store') }}" id="income-form">
                        @csrf

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
                                <label class="form-label" for="nama_pelanggan">Nama Pelanggan <span>*</span></label>
                                <input
                                    type="text" id="nama_pelanggan" name="nama_pelanggan"
                                    value="{{ old('nama_pelanggan') }}"
                                    placeholder="Contoh: Budi Santoso"
                                    class="form-input {{ $errors->has('nama_pelanggan') ? 'err' : '' }}"
                                    required>
                                @error('nama_pelanggan')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <hr class="form-divider">

                            <div class="form-group full">
                                <label class="form-label">Sumber <span>*</span></label>
                                <div class="sumber-pills">
                                    @foreach(['Penjualan Utama', 'Modal', 'Donasi atau Sponsor', 'Lain-lain'] as $opt)
                                        <div class="sumber-pill">
                                            <input
                                                type="radio" id="sumber-{{ $loop->index }}"
                                                name="sumber" value="{{ $opt }}"
                                                {{ old('sumber') === $opt ? 'checked' : '' }}>
                                            <label for="sumber-{{ $loop->index }}">{{ $opt }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('sumber')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <hr class="form-divider">

                            <div class="form-group full">
                                <label class="form-label" for="nominal"> Nominal <span>*</span></label>
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

                            <div class="form-group">
                                <label class="form-label" for="diskon">Diskon</label>

                                <div class="input-suffix-wrap">
                                    <input
                                        type="number"
                                        id="diskon"
                                        name="diskon"
                                        min="0"
                                        max="100"
                                        step="0.01"
                                        value="{{ old('diskon') }}"
                                        placeholder="0"
                                        class="form-input nominal with-suffix">
                                    <span class="input-suffix">%</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="ongkir">Ongkir</label>

                                <div class="input-prefix-wrap">
                                    <span class="input-prefix">Rp</span>

                                    <input
                                        type="number"
                                        id="ongkir"
                                        name="ongkir"
                                        value="{{ old('ongkir') }}"
                                        placeholder="0"
                                        class="form-input nominal with-prefix">
                                </div>
                            </div>

                            <div class="form-group full">
                                <label class="form-label">Total Bersih</label>

                                <div class="input-prefix-wrap">
                                    <span class="input-prefix">Rp</span>

                                    <input
                                        type="text"
                                        id="total_bersih"
                                        class="form-input nominal with-prefix"
                                        readonly>
                                </div>
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
                                <a href="{{ route('income.index') }}" class="btn-cancel">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
                                    Batal
                                </a>
                                <button type="submit" class="btn-save">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                                    Simpan Income
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
    const nominal = document.getElementById('nominal');
    const diskon = document.getElementById('diskon');
    const ongkir = document.getElementById('ongkir');
    const total = document.getElementById('total_bersih');

    function hitungTotal() {

        const n = parseFloat(nominal.value) || 0;
        const d = parseFloat(diskon.value) || 0;
        const o = parseFloat(ongkir.value) || 0;

        const hasil = n - (n * d / 100) + o;

        total.value = hasil.toLocaleString('id-ID');
    }

    nominal.addEventListener('input', hitungTotal);
    diskon.addEventListener('input', hitungTotal);
    ongkir.addEventListener('input', hitungTotal);

    hitungTotal();
    </script>

</x-app-layout>