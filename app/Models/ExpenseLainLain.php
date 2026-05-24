<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseLainLain extends Model
{
    use HasFactory;

    protected $table = 'expense_lain_lain';

    protected $fillable = [
        'transaction_id',
        'tanggal',
        'nama_admin',
        'keterangan',
        'harga',
        'kuantiti',
        'total',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'harga' => 'decimal:2',
        'total' => 'decimal:2',
    ];
}
