<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportasi extends Model
{
    use HasFactory;
    protected $table = "transportasi";
    protected $fillable = [
    'id_transportasi',
    'kode',
    'jumlah_kursi',
    'keterangan',
    'id_type_transportasi'];
    // public static function data(){
    //     $transportasi = DB::table('transportasis')->get();
    //         return $transportasi;
    public function type_transportasi()
    {
        return $this->belongsTo(Type_Transportasi::class, 'id_type_transportasi','id_type_transportasi');
    }
    public function rute()
    {
        return $this->hasMany(Rute::class, 'id_transportasi','id_transportasi');
    }
}

