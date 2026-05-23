<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
            <p class="text-sm text-gray-600">TigaPilihan.ptk finance overview</p>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-[#fe914d] to-[#fd593d] rounded-2xl p-6 sm:p-8 shadow-sm">
                <div class="flex items-start justify-between flex-wrap gap-4">
                    <div>
                        <p class="text-white/90 text-sm">Today: {{ $today->format('d M Y') }}</p>
                        <h3 class="text-white text-2xl sm:text-3xl font-bold mt-1">
                            Rp. {{ number_format($todayBalance, 2, ',', '.') }}
                        </h3>
                        <p class="text-white/90 mt-2 text-sm">
                            Today balance = {{ number_format($todayIncomes, 2, ',', '.') }} (income) - {{ number_format($todayExpenses, 2, ',', '.') }} (expenses)
                        </p>
                    </div>

                    <div class="flex gap-3">
                        <a href="{{ route('expenses.index') }}" class="bg-white/15 hover:bg-white/25 text-white px-4 py-2 rounded-xl border border-white/20 text-sm font-semibold">View Expenses</a>
                        <a href="{{ route('income.index') }}" class="bg-white/15 hover:bg-white/25 text-white px-4 py-2 rounded-xl border border-white/20 text-sm font-semibold">View Income</a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Expenses</p>
                            <p class="text-2xl font-bold text-gray-900 mt-1">Rp. {{ number_format($totalExpenses, 2, ',', '.') }}</p>
                        </div>
                        <div class="w-11 h-11 rounded-xl bg-red-50 flex items-center justify-center">
                            <span class="text-[#f53003] font-bold">-</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-3">All expenses transaction nominal</p>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Incomes</p>
                            <p class="text-2xl font-bold text-gray-900 mt-1">Rp. {{ number_format($totalIncomes, 2, ',', '.') }}</p>
                        </div>
                        <div class="w-11 h-11 rounded-xl bg-green-50 flex items-center justify-center">
                            <span class="text-green-700 font-bold">+</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-3">All income transaction nominal</p>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Today&apos;s Balance</p>
                            <p class="text-2xl font-bold text-gray-900 mt-1">Rp. {{ number_format($todayBalance, 2, ',', '.') }}</p>
                        </div>
                        <div class="w-11 h-11 rounded-xl bg-indigo-50 flex items-center justify-center">
                            <span class="text-indigo-700 font-bold">=</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-3">Computed from today&apos;s incomes - expenses</p>
                </div>
            </div>

            <div class="mt-4 bg-white rounded-2xl shadow-sm border border-gray-100">
                <div class="p-6">
                    <div class="flex items-center justify-between flex-wrap gap-2">
                        <div>
                            <h4 class="font-bold text-gray-900">Overall Summary</h4>
                            <p class="text-sm text-gray-500">Total incomes - total expenses</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Overall balance</p>
                            <p class="text-2xl font-bold text-gray-900">Rp. {{ number_format($overallBalance, 2, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

