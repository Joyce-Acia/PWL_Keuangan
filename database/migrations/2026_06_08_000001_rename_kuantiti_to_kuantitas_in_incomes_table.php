<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('incomes') && Schema::hasColumn('incomes', 'kuantiti') && ! Schema::hasColumn('incomes', 'kuantitas')) {
            DB::statement('ALTER TABLE `incomes` CHANGE `kuantiti` `kuantitas` INT DEFAULT 1');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('incomes') && Schema::hasColumn('incomes', 'kuantitas') && ! Schema::hasColumn('incomes', 'kuantiti')) {
            DB::statement('ALTER TABLE `incomes` CHANGE `kuantitas` `kuantiti` INT DEFAULT 1');
        }
    }
};
