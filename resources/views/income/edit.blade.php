<x-app-layout>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    @include('income.partials.style')

    <div class="form-root py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">

            {{-- BREADCRUMB --}}
            <div class="breadcrumb">
                <a href="{{ route('income.index') }}">Transaksi Incomes</a>
                <span class="breadcrumb-sep">›</span>
                <span>Edit</span>
            </div>

            <div class="form-card">

                {{-- HEADER --}}
                <div class="form-card-header">
                    <div class="form-card-header-icon">
                        <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="form-card-title">Edit Income</div>
                        <div class="form-card-sub">Perbarui data transaksi pendapatan</div>
                    </div>
                </div>

                {{-- BODY --}}
                <div class="form-card-body">

                    {{-- ID badge (read-only info) --}}
                    <div class="id-badge">
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="3"/><path d="M9 9h6M9 12h6M9 15h4"/></svg>
                        {{ $income->id_transaksi }}
                    </div>

                    <form method="POST" action="{{ route('income.update', $income) }}">
                        @csrf
                        @method('PUT')

                        @include('income.partials.form', ['income' => $income])

                        {{-- FOOTER --}}
                        <div class="form-card-footer" style="margin: 24px -24px -28px; border-radius: 0 0 16px 16px;">
                            <span class="footer-hint">Pastikan semua data sudah benar sebelum disimpan.</span>
                            <div class="footer-actions">
                                <a href="{{ route('income.index') }}" class="btn-cancel">
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