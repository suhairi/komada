<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penama extends Model
{
    protected $table = 'penama';
    protected $primaryKey = 'id';
    protected $fillable = ['no_anggota', 'nama1', 'nokp1', 'alamat1',
        'nama2', 'nokp2', 'alamat2',
        'created_at', 'updated_at'];

    public function profile()
    {
        return $this->hasOne('App\Profile', 'no_anggota', 'no_anggota');
    }
}
