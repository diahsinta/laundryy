<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['id_member', 'tanggal', 'batas_waktu', 'tanggal_bayar', 'status', 'dibayar', 'id'];

    public function detail()
    {
        return $this->hasMany(DetilTransaksi::class,'id_transaksi', 'id');
    }
        
}