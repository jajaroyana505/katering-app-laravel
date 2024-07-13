<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantModel extends Model
{
    use HasFactory;
    protected $table = 'merchants';
    protected $fillable = [
        'nama_merchant', 'alamat', 'kontak', 'deskripsi',
    ];

    // Relasi ke Menu
    public function menus()
    {
        return $this->hasMany(MenuModel::class);
    }
}
