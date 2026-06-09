<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_id',
        'tanggal',
        'nama_admin',
        'kategori_pengeluaran',
        'nominal',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
