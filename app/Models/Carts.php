<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
    public $primaryKey = 'id_cart';
    protected $table="carts";
    protected $fillable = [
        'id_produk', 'id_rate', 'jumlah', 'total_harga'
    ];

    public function produk(){
        return $this->belongsTo(Produks::class,'id_produk', 'id_produk');
    }

    public function rates(){
        return $this->belongsTo(Rates::class,'id_rate', 'id_rate');
    }
}
