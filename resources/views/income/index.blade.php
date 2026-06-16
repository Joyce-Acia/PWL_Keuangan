<x-app-layout>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .inc-root { font-family: 'DM Sans', sans-serif; background: #fffaed; min-height: 100vh; }

        .page-header {
            display: flex; align-items: flex-start;
            justify-content: space-between; flex-wrap: wrap;
            gap: 12px; margin-bottom: 24px;
        }
        .page-title { font-size: 1.25rem; font-weight: 700; color: #1a1a1a; }
        .page-sub   { font-size: 0.8rem; color: #9ca3af; margin-top: 3px; }

        .btn-add {
            display: inline-flex; align-items: center; gap: 7px;
            background: #449672;
            color: #fff; font-size: 0.82rem; font-weight: 600;
            padding: 9px 18px; border-radius: 10px;
            text-decoration: none; transition: opacity 0.2s;
            white-space: nowrap;
        }
        .btn-add:hover { opacity: 0.88; }

        .alert-success {
            margin-bottom: 16px; padding: 12px 16px;
            background: rgba(68,150,114,0.1); border: 1px solid rgba(68,150,114,0.3);
            color: #449672; border-radius: 10px; font-size: 0.85rem;
        }

        .table-wrap {
            background: #fff2cc;
            border-radius: 16px;
            border: 1px solid #f0e9b0;
            overflow: hidden;
        }

        table { width: 100%; border-collapse: collapse; }

        thead th {
            padding: 12px 16px;
            text-align: left;
            font-size: 0.72rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.06em;
            color: #9ca3af;
            background: #fff2cc;
            border-bottom: 1px solid #f0e9b0;
        }
        thead th:last-child { text-align: right; }

        tbody tr {
            border-bottom: 1px solid #f0e9b0;
            transition: background 0.12s;
            background: #fffaed;
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: #fff2cc; }

        tbody td {
            padding: 13px 16px;
            font-size: 0.84rem;
            color: #1a1a1a;
            vertical-align: middle;
        }
        tbody td:last-child { text-align: right; }

        .td-id {
            font-family: monospace; font-size: 0.78rem;
            color: #9ca3af; background: rgba(31,31,31,0.04);
            padding: 3px 7px; border-radius: 6px;
            display: inline-block;
        }

        .td-total { font-weight: 700; color: #449672; }
        .td-harga { font-size: 0.78rem; color: #6b7280; }
        .td-qty   { font-size: 0.78rem; color: #6b7280; }

        .badge-produk {
            display: inline-block;
            font-size: 0.7rem; font-weight: 600;
            padding: 3px 9px; border-radius: 20px;
            background: rgba(68,150,114,0.12); color: #449672;
        }

        .action-edit {
            font-size: 0.8rem; font-weight: 600;
            color: #F59E0B; text-decoration: none;
        }
        .action-edit:hover { opacity: 0.75; }

        .action-delete {
            font-size: 0.8rem; font-weight: 600;
            color: #ff4336; background: none;
            border: none; cursor: pointer; padding: 0;
        }
        .action-delete:hover { opacity: 0.75; }

        .empty-state {
            padding: 60px 24px; text-align: center;
            color: #9ca3af; font-size: 0.875rem;
            background: #fffaed;
        }
        .empty-icon { font-size: 2rem; margin-bottom: 10px; }

        .pagination-wrap { margin-top: 20px; }
    </style>

    <div class="inc-root py-8 px-4 sm:px-8">
        <div class="max-w-7xl mx-auto">

            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <div class="page-header">
                <div>
                    <div class="page-title">Transaksi Income</div>
                    <div class="page-sub">Semua entri pendapatan yang direkam</div>
                </div>
                <a href="{{ route('income.create') }}" class="btn-add">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                    Tambah Income
                </a>
            </div>

            <div class="table-wrap">
                @if($incomes->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon">📭</div>
                        <div>Tidak ada catatan pendapatan yang ditemukan.</div>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID Transaksi</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Kuantitas</th>
                                    <th>Total</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($incomes as $income)
                                    <tr>
                                        <td>
                                            <span class="td-id">
                                                {{ strlen($income->id_transaksi) > 8 ? substr($income->id_transaksi, 0, 8) . '…' : $income->id_transaksi }}
                                            </span>
                                        </td>
                                        <td>{{ $income->tanggal }}</td>
                                        <td>{{ $income->nama_pelanggan }}</td>
                                        <td><span class="badge-produk">{{ $income->produk }}</span></td>
                                        <td class="td-harga">Rp {{ number_format($income->harga, 2, ',', '.') }}</td>
                                        <td class="td-qty">{{ $income->kuantitas }}</td>
                                        <td class="td-total">Rp {{ number_format($income->harga * $income->kuantitas, 2, ',', '.') }}</td>
                                        <td>{{ $income->keterangan }}</td>
                                        <td>
                                            <a href="{{ route('income.edit', $income) }}" class="action-edit">Edit</a>
                                            <form action="{{ route('income.destroy', $income) }}" method="POST" class="inline-block ml-3" onsubmit="return confirm('Hapus income ini?');">
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

                    <div class="pagination-wrap px-4 pb-4">
                        {{ $incomes->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>

</x-app-layout>