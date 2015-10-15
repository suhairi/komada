<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inactive extends Model
{
    protected $table = 'inactive';
    protected $primaryKey = 'no_anggota';
    protected $fillable = ['no_anggota', 'catatan', 'status'];

    public function profile()
    {
        return $this->hasOne('App\Profile', 'no_anggota', 'id');
    }
}
