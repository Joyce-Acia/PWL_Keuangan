<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_transaksi',
        'tanggal',
        'nama_admin',
        'kategori_pengeluaran',
        'nominal',
        'keterangan',
    ];

    protected static function booted()
{
    static::creating(function (self $expense) {
        if (empty($expense->id_transaksi)) {
            $expense->id_transaksi = 'TMP-' . str_replace('.', '', uniqid('', true));
        }
    });

    static::created(function (self $expense) {
        if (str_starts_with($expense->id_transaksi, 'TMP-')) {
            $expense->id_transaksi = 'EXP-' . str_pad($expense->id, 6, '0', STR_PAD_LEFT);
            $expense->saveQuietly();
        }
    });
}

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
