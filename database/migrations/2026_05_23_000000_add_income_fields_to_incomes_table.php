<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('incomes', function (Blueprint $table) {
            $table->string('kategori')->nullable()->after('nama_pelanggan');
            $table->integer('kuantitas')->default(1)->after('kategori');
            $table->decimal('harga', 15, 2)->default(0)->after('kuantitas');

            // nominal already exists, keep it
            // keterangan already exists, keep it
        });
    }

    public function down(): void
    {
        Schema::table('incomes', function (Blueprint $table) {
            $table->dropColumn(['kategori', 'kuantitas', 'harga']);
        });
    }
};

