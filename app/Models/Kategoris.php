<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoris extends Model
{
    use HasFactory;
    public $primaryKey = 'id_kategori';
    protected $table="kategoris";
    protected $fillable = [
        'nama_kategori'
    ];

    public function produks(){
        return $this->hasMany(Produks::class,'id_kategori', 'id_kategori');
    }
}
