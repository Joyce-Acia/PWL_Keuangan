<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_id',
        'tanggal',
        'nama_pelanggan',
        'produk',
        'kuantitas',
        'harga',
        'nominal',
        'keterangan',
    ];

    protected $appends = ['total'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTotalAttribute()
    {
        return (float) $this->harga * (float) $this->kuantitas;
    }
}

