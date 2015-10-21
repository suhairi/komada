<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AkaunPotongan extends Model
{
    protected $table = 'akaunpotongan';
    protected $primaryKey = 'id';
    protected $fillable = ['no_anggota', 'perkhidmatan_id', 'jumlah'];

    public function perkhidmatan()
    {
        return $this->hasOne('App\Perkhidmatan', 'id', 'perkhidmatan_id');
    }
}
