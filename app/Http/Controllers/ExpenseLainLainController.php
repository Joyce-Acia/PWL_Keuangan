<?php

namespace App\Http\Controllers;

use App\Models\ExpenseLainLain;
use Illuminate\Http\Request;

class ExpenseLainLainController extends Controller
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
        $expenses = ExpenseLainLain::orderBy('id', 'desc')->paginate(15);
        return view('expenses.lain-lain.index', compact('expenses'));
    }

    public function create()
    {
        $this->ensureAdmin();
        return view('expenses.lain-lain.create');
    }

    public function store(Request $request)
    {
        $this->ensureAdmin();

        $validated = $request->validate([
            'transaction_id' => 'nullable|string',
            'tanggal' => 'required|date',
            'nama_admin' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'kuantiti' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
        ]);

        $validated['transaction_id'] = $validated['transaction_id'] ?: ('LAIN-' . now()->format('YmdHis') . '-' . strtoupper(
            bin2hex(random_bytes(3))
        ));

        ExpenseLainLain::create($validated);

        return redirect()->route('expense-lain-lain.index')->with('success', 'Expense Lain-Lain saved.');
    }

    public function edit(ExpenseLainLain $expenseLainLain)
    {
        $this->ensureAdmin();
        return view('expenses.lain-lain.edit', compact('expenseLainLain'));
    }

    public function update(Request $request, ExpenseLainLain $expenseLainLain)
    {
        $this->ensureAdmin();

        $validated = $request->validate([
            'transaction_id' => 'required|string|unique:expense_lain_lain,transaction_id,' . $expenseLainLain->id,
            'tanggal' => 'required|date',
            'nama_admin' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'kuantiti' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
        ]);

        $expenseLainLain->update($validated);

        return redirect()->route('expense-lain-lain.index')->with('success', 'Expense Lain-Lain updated.');
    }

    public function destroy(ExpenseLainLain $expenseLainLain)
    {
        $this->ensureAdmin();
        $expenseLainLain->delete();
        return redirect()->route('expense-lain-lain.index')->with('success', 'Expense Lain-Lain deleted.');
    }
}
