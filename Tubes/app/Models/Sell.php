<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart_Sell;

class Sell extends Model
{
    use HasFactory;

    protected $table = 'sells';

    protected $fillable = [
        'nama',
        'stok',
        'ukuran',
        'warna',
        'harga',
        'gambar',
    ];

    public function cart_sells()
    {
        return $this->hasMany(Cart_Sell::class);
    }
    
}
