<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('incomes', function (Blueprint $table) {
            if (! Schema::hasColumn('incomes', 'sumber')) {
                $table->string('sumber')->nullable()->after('nama_pelanggan');
            }

            if (Schema::hasColumn('incomes', 'produk')) {
                $table->dropColumn('produk');
            }
            if (Schema::hasColumn('incomes', 'kuantitas')) {
                $table->dropColumn('kuantitas');
            }
            if (Schema::hasColumn('incomes', 'harga')) {
                $table->dropColumn('harga');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('incomes', function (Blueprint $table) {
            if (! Schema::hasColumn('incomes', 'produk')) {
                $table->string('produk')->nullable()->after('nama_pelanggan');
            }
            if (! Schema::hasColumn('incomes', 'kuantitas')) {
                $table->integer('kuantitas')->default(1)->after('produk');
            }
            if (! Schema::hasColumn('incomes', 'harga')) {
                $table->decimal('harga', 15, 2)->default(0)->after('kuantitas');
            }
            if (Schema::hasColumn('incomes', 'sumber')) {
                $table->dropColumn('sumber');
            }
        });
    }
};
