<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profile;

class Yurantambahan extends Model
{
    protected $table = 'yurantambahan';
    protected $primaryKey = 'id';
    protected $fillable = ['jumlah', 'sumbangan_id', 'tarikh', 'penerima', 'no_gaji', 'created_at', 'updated_at'];
    protected $dates = ['tarikh'];

    public function sumbangan()
    {
        return $this->hasOne('App\Sumbangan', 'id', 'sumbangan_id');
    }

    public function profileName($no_gaji)
    {
        return Profile::where('no_gaji', $no_gaji)
            ->first()
            ->nama;
    }

}
