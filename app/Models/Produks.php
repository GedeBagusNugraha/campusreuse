<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produks extends Model
{
    use HasFactory;
    public $primaryKey = 'id_produk';
    protected $table="produks";
    protected $fillable = [
        'foto_produk', 'nama_produk', 'desc_produk', 'id_kategori', 'id_diskon'
    ];
    
    public function kategoris(){
        return $this->belongsTo(Kategoris::class,'id_kategori', 'id_kategori');
    }

    public function rates(){
        return $this->hasMany(Rates::class,'id_produk', 'id_produk');
    }

    public function carts(){
        return $this->hasMany(Carts::class,'id_produk', 'id_produk');
    }
}

