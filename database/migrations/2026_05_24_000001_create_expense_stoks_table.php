<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('expense_stoks', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id')->unique();
            $table->date('tanggal');
            $table->string('nama_admin');
            $table->string('stok');
            $table->decimal('harga', 15, 2);
            $table->integer('kuantiti');
            $table->decimal('total', 15, 2);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('expense_stoks');
    }
};
