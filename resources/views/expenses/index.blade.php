<x-app-layout>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .exp-root { font-family: 'Montserrat', sans-serif; background: #fffaed; min-height: 100vh; }

        .page-header {
            display: flex; align-items: flex-start;
            justify-content: space-between; flex-wrap: wrap;
            gap: 12px; margin-bottom: 24px;
        }
        .page-title { font-size: 1.25rem; font-weight: 700; color: #1a1a1a; }
        /* button */
        .page-sub   { font-size: 0.8rem; color: #b87a3a; margin-top: 3px; }

        .btn-add {
            display: inline-flex; align-items: center; gap: 7px;
            background: #FD593D;
            color: #fff; font-size: 0.82rem; font-weight: 600;
            padding: 9px 18px; border-radius: 10px;
            text-decoration: none; transition: opacity 0.2s;
            white-space: nowrap;
        }
        .btn-add:hover { opacity: 0.88; }

        .alert-success {
            margin-bottom: 16px; padding: 12px 16px;
            background: #FFF2CC; border: 1px solid #FEAF52;
            color: #b87a3a; border-radius: 10px; font-size: 0.85rem;
        }

        .table-wrap {
            background: #fff2cc;
            border-radius: 16px;
            border: 1px solid #feaf52;
            overflow: hidden;
        }

        table { width: 100%; border-collapse: collapse; }

        thead th {
            padding: 12px 16px;
            text-align: left;
            font-size: 0.72rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.06em;
            color: #FFFAED;
            background: #FE914D;
            border-bottom: none;
        }
        thead th:last-child { text-align: right; }

        tbody tr {
            border-bottom: 1px solid #FFF2CC;
            transition: background 0.12s;
            background: #fffaed;
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: #fff2cc; }

        tbody td {
            padding: 13px 16px;
            font-size: 0.84rem;
            color: #3a2a18;
            vertical-align: middle;
        }
        tbody td:last-child { text-align: right; white-space: nowrap;}

        .td-id {
            font-family: monospace; font-size: 0.78rem; font-weight: 700;
            color: #FE914D; background: #FFF2CC;
            padding: 3px 8px; border-radius: 6px;
            display: inline-block;
        }

        .td-nominal {
            font-weight: 700; font-size: 0.88rem;
            color: #FD593D;
        }

        .td-kategori {
            font-size: 0.72rem; 
            font-weight: 600; 
            background: #FFF2CC; 
            color: #FE914D; 
            border: 1px solid #FEAF52; 
            padding: 3px 8px; 
            border-radius: 6px; 
            display: inline-block;
        }

        .td-note { font-size: 0.78rem; color: #7a5c3a; font-style: italic; }

        .action-edit {
            font-size: 0.8rem; font-weight: 600;
            color: #FE914D; text-decoration: none;
            background: #FFF2CC;
            padding: 5px 11px; border-radius: 7px;
            transition: background 0.15s, color 0.15s;
        }
        .action-edit:hover { opacity: 0.75; background: #FEAF52; color: #fff2cc;}

        .action-delete {
            display: inline-block;
            font-size: 0.78rem; font-weight: 700;
            color: #FD593D;
            background: rgba(253,89,61,0.09);
            padding: 5px 11px; border-radius: 7px;
            border: none; cursor: pointer;
            margin-left: 4px;
            transition: background 0.15s, color 0.15s;
        }
        .action-delete:hover { opacity: 0.75; background: #FD593D; color: #fff2cc;}

        .empty-state {
            padding: 60px 24px; text-align: center;
            color: #b87a3a; font-size: 0.875rem;
            background: #fffaed;
        }
        .empty-icon { font-size: 2rem; margin-bottom: 10px; }

        .pagination-wrap { margin-top: 20px; }

        .pagination-bar {
            display: flex; align-items: center;
            justify-content: space-between; flex-wrap: wrap;
            gap: 10px;
            padding: 14px 16px;
            background: #FFF2CC;
            border-top: 1.5px solid #FEAF52;
        }
        .pagination-info {
            font-size: 0.78rem; font-weight: 500;
            color: #b87a3a;
        }
        .pagination-info strong { color: #FD593D; font-weight: 700; }
        .pagination-buttons { display: flex; gap: 8px; }

        .btn-page {
            font-size: 0.78rem; font-weight: 700;
            padding: 6px 14px; border-radius: 8px;
            text-decoration: none; border: 1.5px solid #FEAF52;
            display: inline-flex; align-items: center; gap: 5px;
            transition: background 0.15s, color 0.15s;
        }
        .btn-page.prev {
            background: #fff; color: #b87a3a;
        }
        .btn-page.prev:hover { background: #FEAF52; color: #fff; border-color: #FEAF52; }
        .btn-page.next {
            background: #FD593D; color: #fff; border-color: #FD593D;
        }
        .btn-page.next:hover { background: #e04428; border-color: #e04428; }
        .btn-page.disabled {
            background: #FFF2CC; color: #d1b89a;
            border-color: #FEAF52; cursor: not-allowed; pointer-events: none;
        }
    </style>

    <div class="exp-root py-8 px-4 sm:px-8">
        <div class="max-w-7xl mx-auto">

            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <div class="page-header">
                <div>
                    <div class="page-title">Transaksi Expenses</div>
                    <div class="page-sub">Semua transaksi pengeluaran yang telah dicatat</div>
                </div>

                <a href="{{ route('expenses.create') }}" class="btn-add">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                    <span>Tambah Expense</span>
                </a>
            </div>

            <div class="table-wrap">
                @if($expenses->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon">📝</div>
                        <div>Tidak ada catatan pengeluaran yang ditemukan.</div>
                        <div>Silakan tambahkan pengeluaran menggunakan tombol di atas.</div>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide #FFFAED">ID Transaksi</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide #FFFAED">Tanggal</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide #FFFAED">Admin</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide #FFFAED">Kategori</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide #FFFAED">Nominal</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide #FFFAED">Detail</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide #FFFAED">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expenses as $expense)
                                    <tr class="border-t border-[#f0e9b0] bg-[#fffaed] hover:bg-[#fff2cc]">
                                        <td><span class="td-id">{{ 'EXP-' . str_pad((string) $expense->id, 6, '0', STR_PAD_LEFT) }}</span></td>
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-900">{{ \Carbon\Carbon::parse($expense->tanggal)->format('d-m-Y') }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-900">{{ $expense->nama_admin }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-900">{{ $expense->kategori_pengeluaran }}</td>
                                        <td class="px-4 py-4 td-nominal">Rp {{ number_format($expense->nominal, 2, ',', '.') }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-900">{{ $expense->keterangan ?? '-' }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-900">
                                            <a href="{{ route('expenses.edit', $expense) }}" class="action-edit">Edit</a>
                                            <form action="{{ route('expenses.destroy', $expense) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus expense ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-delete">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

              {{-- PAGINATION BAR — always shown when there are records --}}
                    <div class="pagination-bar">
                        <span class="pagination-info">
                            Menampilkan
                            <strong>{{ $expenses->firstItem() }}–{{ $expenses->lastItem() }}</strong>
                            dari <strong>{{ $expenses->total() }}</strong> transaksi
                        </span>
                        <div class="pagination-buttons">
                            @if($expenses->onFirstPage())
                                <span class="btn-page prev disabled">
                                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
                                    Sebelumnya
                                </span>
                            @else
                                <a href="{{ $expenses->previousPageUrl() }}" class="btn-page prev">
                                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
                                    Sebelumnya
                                </a>
                            @endif
 
                            @if($expenses->hasMorePages())
                                <a href="{{ $expenses->nextPageUrl() }}" class="btn-page next">
                                    Selanjutnya
                                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                </a>
                            @else
                                <span class="btn-page next disabled">
                                    Selanjutnya
                                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                </span>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
 
        </div>
    </div>
 

</x-app-layout>
