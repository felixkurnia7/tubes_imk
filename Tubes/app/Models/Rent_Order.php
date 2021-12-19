<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rent;

class Rent_Order extends Model
{
    use HasFactory;

    protected $table = 'rent_orders';

    protected $fillable = [
        'nama',
        'user_id',
        'rent_id',
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

    public function rents()
    {
        return $this->belongsTo(Rent::class, 'rent_id');
    }
}
