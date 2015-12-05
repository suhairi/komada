<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bayaran extends Model
{
    protected $table = 'bayaran';
    protected $primaryKey = 'id';
    protected $fillable = ['no_gaji', 'perkhidmatan_id', 'jumlah'];


    public function perkhidmatan()
    {
        return $this->hasOne('App\Perkhidmatan', 'id', 'perkhidmatan_id');
    }

}
