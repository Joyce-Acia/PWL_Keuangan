<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('incomes', function (Blueprint $table) {
            if (! Schema::hasColumn('incomes', 'id_user')) {
                $after = Schema::hasColumn('incomes', 'id_transaksi') ? 'id_transaksi' : 'transaction_id';
                $table->foreignId('id_user')->nullable()->after($after)->constrained('users')->nullOnDelete();
            }
        });

        Schema::table('expenses', function (Blueprint $table) {
            if (! Schema::hasColumn('expenses', 'id_user')) {
                $after = Schema::hasColumn('expenses', 'id_transaksi') ? 'id_transaksi' : 'transaction_id';
                $table->foreignId('id_user')->nullable()->after($after)->constrained('users')->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('incomes', function (Blueprint $table) {
            if (Schema::hasColumn('incomes', 'id_user')) {
                $table->dropForeign(['id_user']);
                $table->dropColumn('id_user');
            }
        });

        Schema::table('expenses', function (Blueprint $table) {
            if (Schema::hasColumn('expenses', 'id_user')) {
                $table->dropForeign(['id_user']);
                $table->dropColumn('id_user');
            }
        });
    }
};
