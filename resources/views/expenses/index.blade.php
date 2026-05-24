<x-app-layout>
    <x-slot name="header">
        {{-- hidden --}}
    </x-slot>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .exp-root { font-family: 'DM Sans', sans-serif; background: #fffaed; min-height: 100vh; }

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

        /* ── Tabs ── */
        .tab-bar {
            display: inline-flex; gap: 6px;
            background: #fff2cc;
            border: 1px solid #f0e9b0;
            border-radius: 30px;
            padding: 5px;
            margin-bottom: 20px;
        }
        .tab-btn {
            padding: 7px 22px; border-radius: 24px;
            font-size: 0.82rem; font-weight: 600;
            border: none; cursor: pointer;
            transition: all 0.18s;
            background: transparent; color: #9ca3af;
        }
        .tab-btn.active {
            background: #fff;
            color: #ff4336;
            border: 1.5px solid #ff4336;
            box-shadow: 0 1px 4px rgba(255,67,54,0.08);
        }
        .tab-btn:not(.active):hover { color: #1a1a1a; }

        .tab-panel { display: none; }
        .tab-panel.active { display: block; }

        /* ── Table ── */
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
            color: #9ca3af; background: rgba(0,0,0,0.04);
            padding: 3px 7px; border-radius: 6px;
            display: inline-block;
        }

        .td-total { font-weight: 700; color: #ff4336; }
        .td-harga { font-size: 0.78rem; color: #6b7280; }
        .td-qty   { font-size: 0.78rem; color: #6b7280; }

        .badge-stok {
            display: inline-block;
            font-size: 0.7rem; font-weight: 600;
            padding: 3px 9px; border-radius: 20px;
            background: rgba(255,67,54,0.1); color: #ff4336;
        }

        .action-edit {
            font-size: 0.8rem; font-weight: 600;
            color: #449672; text-decoration: none;
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

        .pagination-wrap { padding: 16px; }
    </style>

    <div class="exp-root py-8 px-4 sm:px-8">
        <div class="max-w-7xl mx-auto">

            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <div class="page-header">
                <div>
                    <div class="page-title">Expenses Transactions</div>
                    <div class="page-sub">All recorded expense entries</div>
                </div>

                {{-- Add button changes based on active tab --}}
                <a href="#" id="btn-add-dynamic" class="btn-add">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                    <span id="btn-add-label">Add Expense</span>
                </a>
            </div>

            {{-- Tab Bar --}}
            <div class="tab-bar">
                <button class="tab-btn active" onclick="switchTab('general', this)">General</button>
                <button class="tab-btn" onclick="switchTab('stok', this)">Stok</button>
                <button class="tab-btn" onclick="switchTab('lainlain', this)">Lain-Lain</button>
            </div>

            {{-- TAB: General --}}
            <div id="tab-general" class="tab-panel active">
                <div class="table-wrap">
                    <div class="empty-state">
                        <div class="empty-icon">📝</div>
                        <div>General expense tracking coming soon</div>
                    </div>
                </div>
            </div>

            {{-- TAB: Stok --}}
            <div id="tab-stok" class="tab-panel">
                <div class="table-wrap">
                    @if($expenseStoks->isEmpty())
                        <div class="empty-state">
                            <div class="empty-icon">📭</div>
                            <div>No stok expense records found.</div>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Nama Admin</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Kuantiti</th>
                                        <th>Total</th>
                                        <th>Keterangan</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($expenseStoks as $expense)
                                        <tr>
                                            <td><span class="td-id">{{ substr($expense->transaction_id, 0, 8) }}…</span></td>
                                            <td>{{ $expense->tanggal->format('d-m-Y') }}</td>
                                            <td>{{ $expense->nama_admin }}</td>
                                            <td><span class="badge-stok">{{ $expense->stok }}</span></td>
                                            <td class="td-harga">Rp {{ number_format($expense->harga, 2, ',', '.') }}</td>
                                            <td class="td-qty">{{ $expense->kuantiti }}</td>
                                            <td class="td-total">Rp {{ number_format($expense->total, 2, ',', '.') }}</td>
                                            <td>{{ Str::limit($expense->keterangan, 30) }}</td>
                                            <td>
                                                <a href="{{ route('expense-stok.edit', $expense) }}" class="action-edit">Edit</a>
                                                <form action="{{ route('expense-stok.destroy', $expense) }}" method="POST" style="display: inline;" onsubmit="return confirm('Hapus expense ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-delete">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($expenseStoks->hasPages())
                            <div class="pagination-wrap">
                                {{ $expenseStoks->links('pagination::simple-tailwind') }}
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            {{-- TAB: Lain-Lain --}}
            <div id="tab-lainlain" class="tab-panel">
                <div class="table-wrap">
                    @if($expenseLainLains->isEmpty())
                        <div class="empty-state">
                            <div class="empty-icon">📭</div>
                            <div>No lain-lain expense records found.</div>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Nama Admin</th>
                                        <th>Keterangan</th>
                                        <th>Harga</th>
                                        <th>Kuantiti</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($expenseLainLains as $expense)
                                        <tr>
                                            <td><span class="td-id">{{ substr($expense->transaction_id, 0, 8) }}…</span></td>
                                            <td>{{ $expense->tanggal->format('d-m-Y') }}</td>
                                            <td>{{ $expense->nama_admin }}</td>
                                            <td>{{ Str::limit($expense->keterangan, 30) }}</td>
                                            <td class="td-harga">Rp {{ number_format($expense->harga, 2, ',', '.') }}</td>
                                            <td class="td-qty">{{ $expense->kuantiti }}</td>
                                            <td class="td-total">Rp {{ number_format($expense->total, 2, ',', '.') }}</td>
                                            <td>
                                                <a href="{{ route('expense-lain-lain.edit', $expense) }}" class="action-edit">Edit</a>
                                                <form action="{{ route('expense-lain-lain.destroy', $expense) }}" method="POST" style="display: inline;" onsubmit="return confirm('Hapus expense ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-delete">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($expenseLainLains->hasPages())
                            <div class="pagination-wrap">
                                {{ $expenseLainLains->links('pagination::simple-tailwind') }}
                            </div>
                        @endif
                    @endif
                </div>
            </div>

        </div>
    </div>

    <script>
        const addRoutes = {
            general:  "{{ route('expenses.create') }}",
            stok:     "{{ route('expense-stok.create') }}",
            lainlain: "{{ route('expense-lain-lain.create') }}"
        };
        const addLabels = {
            general:  "Add Expense",
            stok:     "Add Stok Expense",
            lainlain: "Add Lain-Lain Expense"
        };

        function switchTab(tab, btn) {
            // panels
            document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
            document.getElementById('tab-' + tab).classList.add('active');

            // buttons
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // update add button
            document.getElementById('btn-add-dynamic').href = addRoutes[tab];
            document.getElementById('btn-add-label').textContent = addLabels[tab];
        }

        // init add button to general on load
        document.getElementById('btn-add-dynamic').href = addRoutes['general'];
        document.getElementById('btn-add-label').textContent = addLabels['general'];
    </script>

</x-app-layout>