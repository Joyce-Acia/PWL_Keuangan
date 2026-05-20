<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function ensureAdmin()
    {
        if (! auth()->user() || auth()->user()->role !== 'admin') {
            abort(403);
        }
    }

    public function index()
    {
        $this->ensureAdmin();
        $incomes = Income::orderBy('id', 'desc')->paginate(15);
        $expenses = Expense::orderBy('id', 'desc')->paginate(15);
        return view('income.index', compact('incomes', 'expenses'));
    }

    public function create()
    {
        $this->ensureAdmin();
        return view('income.create');
    }

    public function store(Request $request)
    {
        $this->ensureAdmin();

        $validated = $request->validate([
            'transaction_id' => 'required|string|unique:incomes,transaction_id',
            'tanggal' => 'required|date',
            'nama_pelanggan' => 'required|string|max:255',
            'nominal' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        Income::create($validated);

        return redirect()->route('income.index')->with('success', 'Income saved.');
    }

    public function edit(Income $income)
    {
        $this->ensureAdmin();
        return view('income.edit', compact('income'));
    }

    public function update(Request $request, Income $income)
    {
        $this->ensureAdmin();

        $validated = $request->validate([
            'transaction_id' => 'required|string|unique:incomes,transaction_id,' . $income->id,
            'tanggal' => 'required|date',
            'nama_pelanggan' => 'required|string|max:255',
            'nominal' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $income->update($validated);

        return redirect()->route('income.index')->with('success', 'Income updated.');
    }

    public function destroy(Income $income)
    {
        $this->ensureAdmin();
        $income->delete();
        return redirect()->route('income.index')->with('success', 'Income deleted.');
    }
}
