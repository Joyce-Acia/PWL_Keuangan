<x-app-layout>
    <x-slot name="header">
        {{-- hidden --}}
    </x-slot>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    @include('expenses.partials.style')

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

                        @include('expenses.partials.form', ['expense' => null])

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
