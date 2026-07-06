<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi')->unique();
            $table->foreignId('id_user')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->date('tanggal');
            $table->string('nama_admin');
            $table->string('kategori_pengeluaran');
            $table->decimal('nominal', 15, 2);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('expenses');
    }
};
