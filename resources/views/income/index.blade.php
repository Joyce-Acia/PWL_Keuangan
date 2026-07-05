<x-app-layout>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .inc-root { font-family: 'Montserrat', sans-serif; background: #fffaed; min-height: 100vh; }

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
            position:relative;
            border-radius: 16px;
            border: 1px solid #feaf52;
            overflow: visible;
        }

        .table-scroll{
            overflow-x:auto;
            overflow-y:visible;
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
            overflow: visible;
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: #fff2cc; }

        tbody td {
            padding: 13px 16px;
            font-size: 0.84rem;
            color: #3a2a18;
            vertical-align: middle;
            overflow: visible;
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
            color: #3cc26d;
        }
 
        .td-sumber {
            font-size: 0.72rem; font-weight: 600;
            background: #FFF2CC; color: #FE914D;
            border: 1px solid #FEAF52;
            padding: 3px 8px; border-radius: 6px;
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
            transition: background 0.15s, color 0.15s;        }
        .action-delete:hover { opacity: 0.75; background: #FD593D; color: #fff2cc;}

        .empty-state {
            padding: 60px 24px; text-align: center;
            color: #b87a3a; font-size: 0.875rem;
            background: #fffaed;
        }
        .empty-icon { font-size: 2rem; margin-bottom: 10px; }

        .pagination-wrap { margin-top: 20px; }

        .nominal-wrapper{
            display:flex;
            align-items:center;
            gap:6px;
        }

        .info-icon{
            width:18px;
            height:18px;

            display:flex;
            align-items:center;
            justify-content:center;

            border-radius:50%;
            background:#FFE7BF;
            color:#FE914D;

            font-size:11px;
            font-weight:700;
            cursor:pointer;

            position:relative;

            transition:.2s;
        }

        .info-icon:hover{
            background:#FE914D;
            color: #1a1a1a;
        }

        .info-tooltip{
            position: fixed;
            width:240px;
            background:white;
            border:1px solid #FFD089;
            border-radius:14px;
            padding:14px;
            box-shadow:0 12px 30px rgba(0,0,0,.15);
            opacity:0;
            visibility:hidden;
            transition:.2s;
            z-index:99999;
        }

        .tooltip-title{
            font-size:.82rem;
            font-weight:700;
            color:#FD593D;

            margin-bottom:10px;
            padding-bottom:8px;

            border-bottom:1px dashed #FFE1B0;
        }

        .tooltip-row{

            display:flex;
            justify-content:space-between;

            margin:7px 0;

            font-size:.82rem;
        }

        .tooltip-label{
            color:#7A5C3A;
        }

        .tooltip-value{
            font-weight:700;
        }

        .tooltip-total{
            margin-top:10px;
            padding-top:10px;

            border-top:1px dashed #FFE1B0;

            display:flex;
            justify-content:space-between;

            font-weight:700;
            color:#3CC26D;
        }

    </style>

    <div class="inc-root py-8 px-4 sm:px-8">
        <div class="max-w-7xl mx-auto">

            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <div class="page-header">
                <div>
                    <div class="page-title">Transaksi Incomes</div>
                    <div class="page-sub">Semua transaksi pemasukan yang telah dicatat</div>
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
                        <div>Tidak ada catatan pemasukan yang ditemukan.</div>
                        <div>Silakan tambahkan pemasukan menggunakan tombol di atas.</div>
                    </div>
                @else
                    <div class="table-scroll">
                        <table>
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide #FFFAED"> ID Transaksi</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide #FFFAED">Tanggal</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide #FFFAED">Nama Pelanggan</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide #FFFAED">Sumber</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide #FFFAED">Nominal</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide #FFFAED">Keterangan</th>
                                    <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wide #FFFAED">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($incomes as $income)
                                    <tr class="border-t border-[#f0e9b0] bg-[#fffaed] hover:bg-[#fff2cc]" >
                                        <td class="px-4 py-4"><span class="td-id">{{ $income->id_transaksi }}</span></td>
                                        </td>
                                        <td class="px-4 py-4">{{ $income->tanggal }}</td>
                                        <td class="px-4 py-4">{{ $income->nama_pelanggan }}</td>
                                        <td class="px-4 py-4">{{ $income->sumber }}</td>
                                        <td class="px-4 py-4">

                                            <div class="nominal-wrapper">

                                                <span class="td-nominal">
                                                    Rp {{ number_format($income->total_bersih,2,',','.') }}
                                                </span>

                                                <div class="info-icon">

                                                    i

                                                    <div class="info-tooltip">

                                                        <div class="tooltip-title">
                                                            Detail
                                                        </div>

                                                        <div class="tooltip-row">
                                                            <span class="tooltip-label">Harga Awal</span>
                                                            <span class="tooltip-value">
                                                                Rp {{ number_format($income->nominal,2,',','.') }}
                                                            </span>
                                                        </div>

                                                        <div class="tooltip-row">
                                                            <span class="tooltip-label">Diskon</span>
                                                            <span class="tooltip-value">
                                                                {{ $income->diskon }}%
                                                            </span>
                                                        </div>

                                                        <div class="tooltip-row">
                                                            <span class="tooltip-label">Ongkir</span>
                                                            <span class="tooltip-value">
                                                                Rp {{ number_format($income->ongkir,2,',','.') }}
                                                            </span>
                                                        </div>

                                                        <div class="tooltip-total">
                                                            <span>Total</span>
                                                            <span>
                                                                Rp {{ number_format($income->total_bersih,2,',','.') }}
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </td>
                                        <td class="px-4 py-4">{{ $income->keterangan }}</td>
                                        <td class="px-4 py-4">
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

                @if($incomes->hasPages())
                    <div class="pagination-wrap px-4 pb-4">
                        {{ $incomes->links('pagination::simple-tailwind') }}
                    </div>
                @endif
            @endif
            </div>

        </div>
    </div>

    <script>
        document.querySelectorAll('.info-icon').forEach(icon => {

            const tooltip = icon.querySelector('.info-tooltip');

            icon.addEventListener('mouseenter', () => {

                const rect = icon.getBoundingClientRect();

                tooltip.style.left = rect.left + "px";
                tooltip.style.top = (rect.bottom + 8) + "px";

                tooltip.style.opacity = "1";
                tooltip.style.visibility = "visible";
            });

            icon.addEventListener('mouseleave', () => {

                tooltip.style.opacity = "0";
                tooltip.style.visibility = "hidden";
            });

        });
    </script>

</x-app-layout>