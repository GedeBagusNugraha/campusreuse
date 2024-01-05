<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    use HasFactory;
    public $primaryKey = 'id_rate';
    protected $table="rates";
    protected $fillable = [
        'id_produk', 'nama_rate', 'date_from', 'date_end'
    ];

    public function produks(){
        return $this->belongsTo(produks::class,'id_produk', 'id_produk');
    }

    public function carts(){
        return $this->hasMany(Carts::class,'id_rate', 'id_rate');
    }
}
