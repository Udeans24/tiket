<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_Transportasi extends Model
{
    use HasFactory;
    protected $primarykey = 'id_type_transportasi';
    protected $guarded = 'id_type_transportasi';
    protected $table = 'type_transportasi';
    protected $fillable = [
    'id_type_transportasi',
    'nama_type',
    'keterangan'
    ];
        public function transportasi()
        {
            return $this->hasMany(Transportasi::class, 'id_transportasi','id_transportasi');
    }
}

