<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'tanggal_transaksi', 'total_pengeluaran', 'metode_pembayaran', 'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
