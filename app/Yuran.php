<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yuran extends Model
{
    protected $table = 'yuran';
    protected $primaryKey = 'id';
    protected $fillable = ['no_anggota', 'bulan_tahun', 'jumlah', 'tka'];

    public function Profile()
    {
        return $this->hasOne('App\Profile', 'no_anggota', 'id');
    }

    public function yuranTambahan()
    {
        return $this->belongsTo('App\Yurantambahan');
    }
}
