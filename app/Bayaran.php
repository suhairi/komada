<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bayaran extends Model
{
    protected $table = 'bayaran';
    protected $primaryKey = 'id';
    protected $fillable = ['no_gaji', 'akaunpotongan_id', 'jumlah'];


    public function perkhidmatan()
    {
        return $this->hasOne('App\AkaunPotongan', 'id', 'akaunpotongan_id');
    }

}
