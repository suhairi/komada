<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yurantambahan extends Model
{
    protected $table = 'yurantambahan';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'jumlah', 'sumbangan_id', 'penerima', 'tarikh', 'no_anggota', 'created_at', 'updated_at'];

    public function sumbangan()
    {
        return $this->hasOne('App\Sumbangan', 'id', 'sumbangan_id');
    }

}
