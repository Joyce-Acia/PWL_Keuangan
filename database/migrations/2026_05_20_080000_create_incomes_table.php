<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi')->unique();
            $table->foreignId('id_user')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->date('tanggal');
            $table->string('nama_pelanggan');
            $table->string('sumber')->nullable();
            $table->decimal('nominal',15,2);
            // Ini yang tambahan
            $table->decimal('diskon',5,2)->default(0);
            $table->decimal('ongkir',15,2)->default(0);
            $table->decimal('total_bersih',15,2)->default(0);

            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('incomes');
    }
};
