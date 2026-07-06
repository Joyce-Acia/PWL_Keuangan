<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
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
        $incomes = Income::orderBy('id', 'desc')->paginate(15);
        return view('income.index', compact('incomes'));
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
            'tanggal' => 'required|date',
            'nama_pelanggan' => 'required|string|max:255',
            'sumber' => 'required|string|max:255',
            'nominal' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $validated['id_user'] = auth()->id();

        $income = Income::create($validated);

        return redirect()->route('income.index')->with('success', 'Income sudah disimpan.');
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
            'tanggal' => 'required|date',
            'nama_pelanggan' => 'required|string|max:255',
            'sumber' => 'required|string|max:255',
            'nominal' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $income->update($validated);

        return redirect()->route('income.index')->with('success', 'Income sudah diupdate.');
    }

    public function destroy(Income $income)
    {
        $this->ensureAdmin();
        $income->delete();
        return redirect()->route('income.index')->with('success', 'Income sudah dihapus.');
    }
}
