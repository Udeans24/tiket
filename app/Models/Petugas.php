<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;


class petugas extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory, Notifiable;
    protected $guarded = ['id_petugas'];
    protected $table = "petugas";

    protected $fillable = ['id_petugas', 'username', 'password', 'nama_petugas', 'id_level'];

    // Define the relationship with the "Level" model
    public function pemesanan(){
        return $this->hasMany(Pemesanan::class, 'id_petugas', 'id_petugas');
    }
}
