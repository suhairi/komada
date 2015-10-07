<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = 'gaji';

    protected $primaryKey = 'no_gaji';
    protected $fillable = ['no_gaji', 'jumlah', 'zon_id', 'no_anggota'];

    public $timestamps = false;

    public function zon()
    {
        return $this->HasOne('App\Zon', 'zon_id', 'id');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile', 'no_anggota', 'no_anggota');
    }
}
