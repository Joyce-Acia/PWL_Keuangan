<x-app-layout>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .exp-root { font-family: 'DM Sans', sans-serif; background: #fffaed; min-height: 100vh; }
        .page-header { display: flex; align-items: flex-start; justify-content: space-between; flex-wrap: wrap; gap: 12px; margin-bottom: 24px; }
        .page-title { font-size: 1.25rem; font-weight: 700; color: #1F1F1F; }
        .page-sub { font-size: 0.8rem; color: #9ca3af; margin-top: 3px; }
        .btn-add { display: inline-flex; align-items: center; gap: 7px; background: #449672; color: #fff; font-size: 0.82rem; font-weight: 600; padding: 9px 18px; border-radius: 10px; text-decoration: none; transition: opacity 0.2s; white-space: nowrap; }
        .btn-add:hover { opacity: 0.88; }
        .table-wrap { background: #fff2cc; border-radius: 16px; border: 1px solid #f0e9b0; overflow: hidden; }
        .empty-state { padding: 60px 24px; text-align: center; color: #9ca3af; font-size: 0.875rem; background: #fffaed; }
        .empty-icon { font-size: 2rem; margin-bottom: 10px; }
        .alert-success { margin-bottom: 16px; padding: 12px 16px; background: rgba(68,150,114,0.1); border: 1px solid rgba(68,150,114,0.3); color: #449672; border-radius: 10px; font-size: 0.85rem; }
        .action-edit { color: #F59E0B; font-weight: 600; text-decoration: none; margin-right: 0.75rem; }
        .action-edit:hover { opacity: 0.8; }
        .action-delete { color: #ff4336; font-weight: 600; background: none; border: none; cursor: pointer; padding: 0; }
        .action-delete:hover { opacity: 0.8; }
    </style>

    <div class="exp-root py-8 px-4 sm:px-8">
        <div class="max-w-7xl mx-auto">

            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <div class="page-header">
                <div>
                    <div class="page-title">Transaksi Expenses</div>
                    <div class="page-sub">Untuk mengelola transaksi pengeluaran</div>
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
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide text-gray-500">ID Transaksi</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide text-gray-500">Tanggal</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide text-gray-500">Admin</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide text-gray-500">Kategori</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide text-gray-500">Jumlah</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide text-gray-500">Detail</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide text-gray-500">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expenses as $expense)
                                    <tr class="border-t border-[#f0e9b0] bg-[#fffaed] hover:bg-[#fff2cc]">
                                        <td class="px-4 py-4 text-sm text-gray-900">
                                            {{ 'EXP-' . str_pad((string) $expense->id, 6, '0', STR_PAD_LEFT) }}
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-900">{{ \Carbon\Carbon::parse($expense->tanggal)->format('d-m-Y') }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-900">{{ $expense->nama_admin }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-900">{{ $expense->kategori_pengeluaran }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-900">Rp {{ number_format($expense->nominal, 2, ',', '.') }}</td>
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

                    @if($expenses->hasPages())
                        <div class="pagination-wrap">
                            {{ $expenses->links('pagination::simple-tailwind') }}
                        </div>
                    @endif
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
