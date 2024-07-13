<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $fillable = [
        'nama', 'deskripsi', 'harga', 'merchant_id', 'gambar'
    ];

    // Relasi ke Merchant
    public function merchants()
    {
        return $this->belongsTo(MerchantModel::class);
    }
}
