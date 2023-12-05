<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Penumpang extends Authenticatable
{
    use HasFactory;
    protected $table = "penumpangs";
    protected $fillable = ['id_penumpang', 'username', 'password', 'nama_penumpang', 'alamat_penumpang', 'tanggal_lahir', 'jenis_kelamin', 'telfon', 'id_user'];
    public static function data(){
        $penumpang = DB::table('penumpangs')->get();
        return $penumpang;
     }
     public function pemesanan(){
        return $this->hasMany(Pemesanan::class, 'id_penumpang', 'id_penumpang');
     }
}

