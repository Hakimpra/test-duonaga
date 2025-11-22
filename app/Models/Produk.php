<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
class Produk extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'harga', 'deskripsi', 'gambar', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
