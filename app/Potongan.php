<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
    protected $table = 'potongan';
    protected $primaryKey = 'id';
    protected $fillable = ['no_anggota', 'jumlah'];

    public function profile()
    {
        return $this->hasOne('App\Profile', 'no_anggota', 'id');
    }

}
