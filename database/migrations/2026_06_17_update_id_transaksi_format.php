<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        // Update incomes id_transaksi to INC-000001 format
        DB::table('incomes')->get()->each(function ($income) {
            DB::table('incomes')
                ->where('id', $income->id)
                ->update([
                    'id_transaksi' => 'INC-' . str_pad($income->id, 6, '0', STR_PAD_LEFT)
                ]);
        });

        // Update expenses id_transaksi to EXP-000001 format
        DB::table('expenses')->get()->each(function ($expense) {
            DB::table('expenses')
                ->where('id', $expense->id)
                ->update([
                    'id_transaksi' => 'EXP-' . str_pad($expense->id, 6, '0', STR_PAD_LEFT)
                ]);
        });
    }

    public function down()
    {
        // This migration cannot be safely reversed
    }
};
