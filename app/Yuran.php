<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yuran extends Model
{
    protected $table = 'yuran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_gaji', 'bulan_tahun', 'yuran', 'tka', 'takaful', 
        'pwt', 'pwtcp', 'pwtins',
        'rt',
        'bs',
        'rt',
        'tb', 'tbcp', 'tbins', 
        'kc', 'kccp', 'kcins',
        'zon_gaji_id'
        ];

    public function profile()
    {
        return $this->hasOne('App\Profile', 'id', 'no_gaji');
    }

    public function yuranTambahan()
    {
        return $this->belongsTo('App\Yurantambahan', 'id', 'no_gaji');
    }

    public function zon_gaji()
    {
        return $this->hasOne('App\Zon', 'id', 'zon_gaji_id');
    }

}
