<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Sell;

class Sell_Order extends Model
{
    use HasFactory;

    protected $table = 'sell_orders';

    protected $fillable = [
        'nama',
        'user_id',
        'sell_id',
        'banyak',
        'harga',
        'transaksi',
        'jenis_pesanan',
        'status_konfirmasi',
        'status_bayar',
        'status_kirim',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sells()
    {
        return $this->belongsTo(Sell::class, 'sell_id');
    }
}
