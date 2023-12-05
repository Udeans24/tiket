<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rute extends Model
{
    use HasFactory;
    protected $table = "rute";
    protected $fillable = [
    'id_rute',
    'tujuan',
    'rute_awal',
    'rute_akhir',
    'jamberangkat', 
    'harga',
    'id_transportasi'];
    public function transportasi()
    {
        return $this->belongsTo(Transportasi::class, 'id_transportasi','id_transportasi');
    }
    public function pemesanan(){
        return $this->hasMany(Pemesanan::class, 'id_rute', 'id_rute');
    }
}