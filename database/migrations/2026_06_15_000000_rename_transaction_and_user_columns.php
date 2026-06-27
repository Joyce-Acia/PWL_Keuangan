<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    private function foreignKeyExists(string $table, string $constraint): bool
    {
        $database = DB::getDatabaseName();
        $result = DB::select(
            'SELECT CONSTRAINT_NAME FROM information_schema.TABLE_CONSTRAINTS WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND CONSTRAINT_NAME = ? AND CONSTRAINT_TYPE = ?',
            [$database, $table, $constraint, 'FOREIGN KEY']
        );

        return count($result) > 0;
    }

    public function up(): void
    {
        // Incomes table
        if (Schema::hasTable('incomes')) {
            Schema::table('incomes', function (Blueprint $table) {
                // transaction_id -> id_transaksi
                if (Schema::hasColumn('incomes', 'transaction_id') && ! Schema::hasColumn('incomes', 'id_transaksi')) {
                    try {
                        $table->renameColumn('transaction_id', 'id_transaksi');
                    } catch (\Throwable $e) {
                        DB::statement("ALTER TABLE `incomes` CHANGE `transaction_id` `id_transaksi` VARCHAR(255) NOT NULL");
                    }
                }

                // user_id -> id_user (handle FK)
                if (Schema::hasColumn('incomes', 'user_id') && ! Schema::hasColumn('incomes', 'id_user')) {
                    try { $table->dropForeign(['user_id']); } catch (\Throwable $e) {}
                    try {
                        $table->renameColumn('user_id', 'id_user');
                    } catch (\Throwable $e) {
                        DB::statement("ALTER TABLE `incomes` CHANGE `user_id` `id_user` BIGINT UNSIGNED NULL");
                    }
                }
            });

            // re-add foreign key if id_user exists and no FK defined
            Schema::table('incomes', function (Blueprint $table) {
                if (Schema::hasColumn('incomes', 'id_user') && ! $this->foreignKeyExists('incomes', 'incomes_id_user_foreign')) {
                    $table->foreign('id_user')->references('id')->on('users')->nullOnDelete();
                }
            });
        }

        // Expenses table
        if (Schema::hasTable('expenses')) {
            Schema::table('expenses', function (Blueprint $table) {
                // transaction_id -> id_transaksi
                if (Schema::hasColumn('expenses', 'transaction_id') && ! Schema::hasColumn('expenses', 'id_transaksi')) {
                    try {
                        $table->renameColumn('transaction_id', 'id_transaksi');
                    } catch (\Throwable $e) {
                        DB::statement("ALTER TABLE `expenses` CHANGE `transaction_id` `id_transaksi` VARCHAR(255) NOT NULL");
                    }
                }

                // user_id -> id_user (handle FK)
                if (Schema::hasColumn('expenses', 'user_id') && ! Schema::hasColumn('expenses', 'id_user')) {
                    try { $table->dropForeign(['user_id']); } catch (\Throwable $e) {}
                    try {
                        $table->renameColumn('user_id', 'id_user');
                    } catch (\Throwable $e) {
                        DB::statement("ALTER TABLE `expenses` CHANGE `user_id` `id_user` BIGINT UNSIGNED NULL");
                    }
                }
            });

            // re-add foreign key if id_user exists and no FK defined
            Schema::table('expenses', function (Blueprint $table) {
                if (Schema::hasColumn('expenses', 'id_user') && ! $this->foreignKeyExists('expenses', 'expenses_id_user_foreign')) {
                    $table->foreign('id_user')->references('id')->on('users')->nullOnDelete();
                }
            });
        }
    }

    public function down(): void
    {
        // Reverse: incomes
        if (Schema::hasTable('incomes')) {
            Schema::table('incomes', function (Blueprint $table) {
                if (Schema::hasColumn('incomes', 'id_user')) {
                    try { $table->dropForeign(['id_user']); } catch (\Throwable $e) {}
                    try {
                        $table->renameColumn('id_user', 'user_id');
                    } catch (\Throwable $e) {
                        DB::statement("ALTER TABLE `incomes` CHANGE `id_user` `user_id` BIGINT UNSIGNED NULL");
                    }
                }

                if (Schema::hasColumn('incomes', 'id_transaksi')) {
                    try {
                        $table->renameColumn('id_transaksi', 'transaction_id');
                    } catch (\Throwable $e) {
                        DB::statement("ALTER TABLE `incomes` CHANGE `id_transaksi` `transaction_id` VARCHAR(255) NOT NULL");
                    }
                }
            });

            Schema::table('incomes', function (Blueprint $table) {
                if (Schema::hasColumn('incomes', 'user_id')) {
                    try {
                        $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
                    } catch (\Throwable $e) {}
                }
            });
        }

        // Reverse: expenses
        if (Schema::hasTable('expenses')) {
            Schema::table('expenses', function (Blueprint $table) {
                if (Schema::hasColumn('expenses', 'id_user')) {
                    try { $table->dropForeign(['id_user']); } catch (\Throwable $e) {}
                    try {
                        $table->renameColumn('id_user', 'user_id');
                    } catch (\Throwable $e) {
                        DB::statement("ALTER TABLE `expenses` CHANGE `id_user` `user_id` BIGINT UNSIGNED NULL");
                    }
                }

                if (Schema::hasColumn('expenses', 'id_transaksi')) {
                    try {
                        $table->renameColumn('id_transaksi', 'transaction_id');
                    } catch (\Throwable $e) {
                        DB::statement("ALTER TABLE `expenses` CHANGE `id_transaksi` `transaction_id` VARCHAR(255) NOT NULL");
                    }
                }
            });

            Schema::table('expenses', function (Blueprint $table) {
                if (Schema::hasColumn('expenses', 'user_id')) {
                    try {
                        $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
                    } catch (\Throwable $e) {}
                }
            });
        }
    }
};
