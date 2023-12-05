<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $table = 'levels';
    protected $fillable = [
        'id_level', 
        'nama_level'
    ];
    public function petugas(){
        return $this->hasMany(Petugas::class, 'id_level', 'id_level');
    }
     
}
