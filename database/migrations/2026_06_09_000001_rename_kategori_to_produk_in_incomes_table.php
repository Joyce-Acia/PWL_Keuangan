<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasColumn('incomes', 'kategori') && ! Schema::hasColumn('incomes', 'produk')) {
            DB::statement("ALTER TABLE `incomes` CHANGE `kategori` `produk` VARCHAR(255) NULL AFTER `nama_pelanggan`");
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('incomes', 'produk') && ! Schema::hasColumn('incomes', 'kategori')) {
            DB::statement("ALTER TABLE `incomes` CHANGE `produk` `kategori` VARCHAR(255) NULL AFTER `nama_pelanggan`");
        }
    }
};
