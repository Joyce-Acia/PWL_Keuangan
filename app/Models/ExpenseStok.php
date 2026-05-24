<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseStok extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'tanggal',
        'nama_admin',
        'stok',
        'harga',
        'kuantiti',
        'total',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'harga' => 'decimal:2',
        'total' => 'decimal:2',
    ];
}
