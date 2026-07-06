<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_transaksi',
        'tanggal',
        'nama_pihak',
        'sumber',
        'nominal',
        'keterangan',
    ];

    protected static function booted()
    {
        static::creating(function (self $income) {
            if (empty($income->id_transaksi)) {
                $income->id_transaksi = 'TMP-' . str_replace('.', '', uniqid('', true));
            }
        });

        static::created(function (self $income) {
            if (str_starts_with($income->id_transaksi, 'TMP-')) {
                $income->id_transaksi = 'INC-' . str_pad($income->id, 6, '0', STR_PAD_LEFT);
                $income->saveQuietly();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}

