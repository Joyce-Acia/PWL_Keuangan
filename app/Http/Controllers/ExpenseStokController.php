<?php

namespace App\Http\Controllers;

use App\Models\ExpenseStok;
use Illuminate\Http\Request;

class ExpenseStokController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function ensureAdmin()
    {
        if (!auth()->user() || auth()->user()->role !== 'admin') {
            abort(403);
        }
    }

    public function index()
    {
        $this->ensureAdmin();
        $expenses = ExpenseStok::orderBy('id', 'desc')->paginate(15);
        return view('expenses.stok.index', compact('expenses'));
    }

    public function create()
    {
        $this->ensureAdmin();
        return view('expenses.stok.create');
    }

    public function store(Request $request)
    {
        $this->ensureAdmin();

        $validated = $request->validate([
            'transaction_id' => 'nullable|string',
            'tanggal' => 'required|date',
            'nama_admin' => 'required|string|max:255',
            'stok' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'kuantiti' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $validated['transaction_id'] = $validated['transaction_id'] ?: ('STOK-' . now()->format('YmdHis') . '-' . strtoupper(
            bin2hex(random_bytes(3))
        ));

        ExpenseStok::create($validated);

        return redirect()->route('expense-stok.index')->with('success', 'Expense Stok saved.');
    }

    public function edit(ExpenseStok $expenseStok)
    {
        $this->ensureAdmin();
        return view('expenses.stok.edit', compact('expenseStok'));
    }

    public function update(Request $request, ExpenseStok $expenseStok)
    {
        $this->ensureAdmin();

        $validated = $request->validate([
            'transaction_id' => 'required|string|unique:expense_stoks,transaction_id,' . $expenseStok->id,
            'tanggal' => 'required|date',
            'nama_admin' => 'required|string|max:255',
            'stok' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'kuantiti' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $expenseStok->update($validated);

        return redirect()->route('expense-stok.index')->with('success', 'Expense Stok updated.');
    }

    public function destroy(ExpenseStok $expenseStok)
    {
        $this->ensureAdmin();
        $expenseStok->delete();
        return redirect()->route('expense-stok.index')->with('success', 'Expense Stok deleted.');
    }
}
