<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
// role harusnya admin !==
    private function ensureAdmin()
    {
        if (! auth()->user() || auth()->user()->role !== 'admin') {
            abort(403);
        }
    }

    public function index()
    {
        $this->ensureAdmin();
        $expenses = Expense::latest()->paginate(10);
        return view('expenses.index', compact('expenses'));
    }


    public function create()
    {
        $this->ensureAdmin();
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $this->ensureAdmin();

        $validated = $request->validate([
            'tanggal' => 'required|date',
            'nama_admin' => 'required|string|max:255',
            'kategori_pengeluaran' => 'required|string|max:255',
            'nominal' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $validated['id_user'] = auth()->id();

        $expense = Expense::create($validated);

        return redirect()->route('expenses.index')->with('success', 'Expense sudah disimpan.');
    }

    public function edit(Expense $expense)
    {
        $this->ensureAdmin();
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        $this->ensureAdmin();

        $validated = $request->validate([
            'tanggal' => 'required|date',
            'nama_admin' => 'required|string|max:255',
            'kategori_pengeluaran' => 'required|string|max:255',
            'nominal' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $expense->update($validated);

        return redirect()->route('expenses.index')->with('success', 'Expense sudah diupdate.');
    }

    public function destroy(Expense $expense)
    {
        $this->ensureAdmin();
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Expense sudah dihapus.');
    }
}
