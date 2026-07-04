<x-app-layout>
    <x-slot name="header">
        {{-- Hidden: greeting is now inside the dashboard body --}}
    </x-slot>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .dash-root { font-family: 'Montserrat', sans-serif; background: #fffaed; min-height: 100vh; }

        /* ── Greeting ── */
        .dash-greeting { font-size: 1.35rem; font-weight: 700; color: #1F1F1F; }
        .dash-greeting span { font-weight: 400; }
        .dash-sub { font-size: 0.82rem; color: #FFF1E6; margin-top: 2px; }

        /* ── Main layout: left column (balance) + right column (income+expenses) ── */
        .top-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            align-items: stretch;
        }
        @media (max-width: 768px) { .top-row { grid-template-columns: 1fr; } }

        .right-col {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        /* ── Balance card ── */
        .balance-card {
            background: linear-gradient(to right, #ff4336, #ff941d);
            border-radius: 20px;
            padding: 28px 28px 24px;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 280px;
        }

        .balance-label { font-size: 0.82rem; color: rgba(255,255,255,0.75); font-weight: 500; letter-spacing: 0.02em; position: relative; z-index: 1; }
        .balance-amount { font-family: 'Montserrat', sans-serif; font-size: 2.1rem; color: #ffffff; margin-top: 10px; position: relative; z-index: 1; line-height: 1.15; }
        .balance-footer { display: flex; align-items: center; justify-content: space-between; position: relative; z-index: 1; margin-top: 32px; }
        .balance-footer-text { font-size: 0.75rem; color: rgba(255,255,255,0.6); }
        .balance-link {
            display: flex; align-items: center; gap: 6px;
            font-size: 0.78rem; color: rgba(255,255,255,0.9);
            text-decoration: none; font-weight: 600;
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.25);
            padding: 5px 12px; border-radius: 20px;
            transition: background 0.2s;
        }
        .balance-link:hover { background: rgba(255,255,255,0.25); }

        /* ── Summary cards (stacked right) ── */
        .summary-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 22px 24px;
            border: 1px solid #f0f0f0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex: 1;
        }
        .summary-header { display: flex; align-items: center; justify-content: space-between; }
        .summary-title { font-size: 0.9rem; font-weight: 600; color: #374151; }
        .pill {
            font-size: 0.7rem; font-weight: 700; padding: 4px 10px;
            border-radius: 20px; letter-spacing: 0.02em;
        }
        .pill-week { 
            font-size: 0.68rem; 
            font-weight: 700; 
            background: #FFF2CC; 
            color: #b87a3a; 
            border: 1px solid #FEAF52; 
            padding: 3px 9px; 
            border-radius: 20px; }        
            
        .summary-amount { font-family: 'Montserrat', sans-serif; font-size: 1.75rem; font-weight: 300; color: #111827; margin-top: 12px; line-height: 1.1; }
        .summary-sub { font-size: 0.75rem; color: #9ca3af; margin-top: 5px; }

        /* ── Bottom row ── */
        .bottom-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-top: 16px; }
        @media (max-width: 640px) { .bottom-row { grid-template-columns: 1fr; } }

        .stat-card {
            background: #fff;
            border-radius: 20px;
            padding: 22px 24px;
            border: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .stat-icon {
            width: 46px; height: 46px; border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem; flex-shrink: 0;
        }
        .icon-red   { background: #fff1f0; color: #e53e3e; }
        .icon-green { background: #f0fdf4; color: #16a34a; }
        .stat-label { font-size: 0.78rem; color: #9ca3af; font-weight: 500; }
        .stat-value { font-size: 1.3rem; font-weight: 700; color: #111827; margin-top: 2px; }

        .overall-card {
            background: linear-gradient(to right, #ff4336, #ff941d);
            border-radius: 20px;
            padding: 22px 26px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            grid-column: span 2;
            position: relative;
            overflow: hidden;
        }
        @media (max-width: 640px) { .overall-card { grid-column: span 1; } }
        .overall-card::before {
            content: ''; position: absolute;
            right: -20px; top: -30px;
            width: 120px; height: 120px;
            background: rgba(255,255,255,0.1); border-radius: 50%;
        }
        .overall-label { font-size: 0.82rem; color: rgba(255,255,255,0.75); font-weight: 500; }
        .overall-sub   { font-size: 0.73rem; color: rgba(255,255,255,0.5); margin-top: 3px; }
        .overall-amount { font-family: 'Montserrat', sans-serif; font-size: 1.7rem; color: #fff; position: relative; z-index: 1; text-align: right; }
        .overall-amount-label { font-size: 0.75rem; color: rgba(255,255,255,0.6); text-align: right; margin-bottom: 4px; }

        /* ── Header row ── */
        .dash-header-row {
            display: flex; align-items: center;
            justify-content: space-between; margin-bottom: 24px;
        }
        .avatar {
            width: 42px; height: 42px; border-radius: 50%;
            background: #e5e7eb; overflow: hidden;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem; font-weight: 700; color: #6b7280;
            border: 2px solid #fff; box-shadow: 0 1px 6px rgba(0,0,0,0.1);
        }
        .header-actions { display: flex; align-items: center; gap: 10px; }
        .icon-btn {
            width: 38px; height: 38px; border-radius: 50%;
            background: #fff; border: 1px solid #e5e7eb;
            display: flex; align-items: center; justify-content: center;
            color: #6b7280; cursor: pointer;
            transition: box-shadow 0.15s;
            text-decoration: none;
        }
        .icon-btn:hover { box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    </style>

{{-- ALERT --}}
    @if(session('error'))
        <div class="bg-[#fff2cc] text-[#fd593d] p-3 rounded mb-4 border border-[#fd593d]">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div 
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 3000)"
            x-transition
            class="p-3 mb-4 bg-green-100 text-green-700 border border-green-400 rounded"
        >
            {{ session('success') }}
        </div>
    @endif

<div class="dash-root py-8 px-4 sm:px-8">
        <div class="max-w-5xl mx-auto">

            {{-- Header row --}}
            <div class="dash-header-row">
                <div>
                    <div class="dash-greeting">
                        Selamat Datang, <span>{{ Auth::user()->name ?? 'Tim' }}</span> 👋
                    </div>
                    <div class="dash-sub">Ini update mengenai posisi finansial anda.</div>
                </div>
                <!-- <div class="header-actions">
                    <a href="{{ route('expenses.index') }}" class="icon-btn" title="Expenses">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 0 20A10 10 0 0 0 12 2zm0 6v4l3 3"/></svg>
                    </a>
                    <a href="{{ route('income.index') }}" class="icon-btn" title="Income">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                    </a>
                    <div class="avatar">
                        {{ strtoupper(substr(Auth::user()->name ?? 'T', 0, 1)) }}
                    </div>
                </div> -->
            </div>

            {{-- Top row: Balance (left) | Income + Expenses stacked (right) --}}
            <div class="top-row">

                {{-- Total Balance card --}}
                <div class="balance-card">
                    <div>
                        <div class="balance-label">Saldo Kini</div>
                        <div class="balance-amount">
                            Rp {{ number_format($overallBalance, 2, ',', '.') }}
                        </div>
                    </div>
                    <div class="balance-footer">
                        <span class="balance-footer-text">{{ $today->format('d M Y') }}</span>
                        <a href="{{ route('expenses.index') }}" class="balance-link">
                            Saldo Saya
                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Right column: Income + Expenses stacked --}}
                <div class="right-col">

                    <div class="summary-card">
                        <div class="summary-header">
                            <span class="summary-title">Income</span>
                            <span class="pill pill-week">Minggu ini</span>
                        </div>
                        <div>
                            <div class="summary-amount">
                                Rp {{ number_format($todayIncomes, 2, ',', '.') }}
                            </div>
                            <div class="summary-sub">Income Minggu Ini</div>
                        </div>
                    </div>

                    <div class="summary-card">
                        <div class="summary-header">
                            <span class="summary-title">Expenses</span>
                            <span class="pill pill-week">Minggu ini</span>
                        </div>
                        <div>
                            <div class="summary-amount">
                                Rp {{ number_format($todayExpenses, 2, ',', '.') }}
                            </div>
                            <div class="summary-sub">Expense Minggu Ini</div>
                        </div>
                    </div>

                </div>

            </div>

            {{-- Bottom row: All-time stats + Overall balance --}}
            <div class="bottom-row">

                <div class="stat-card">
                    <div class="stat-icon icon-red">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
                    </div>
                    <div>
                        <div class="stat-label">Total Expenses</div>
                        <div class="stat-value">Rp {{ number_format($totalExpenses, 2, ',', '.') }}</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon icon-green">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
                    </div>
                    <div>
                        <div class="stat-label">Total Incomes</div>
                        <div class="stat-value">Rp {{ number_format($totalIncomes, 2, ',', '.') }}</div>
                    </div>
                </div>

                <!-- <div class="overall-card">
                    <div>
                        <div class="overall-label">Total Keseluruhan</div>
                        <div class="overall-sub">Total incomes − total expenses</div>
                    </div>
                    <div>
                        <div class="overall-amount-label">Saldo Keseluruhan</div>
                        <div class="overall-amount">Rp {{ number_format($overallBalance, 2, ',', '.') }}</div>
                    </div>
                </div> -->

            </div>

        </div>
    </div>
</x-app-layout>