<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AkaunPotongan extends Model
{
    protected $table = 'akaunpotongan';
    protected $primaryKey = 'id';
    protected $fillable = [
                            'no_gaji',
                            'perkhidmatan_id',
                            'jumlah',
                            'tempoh',
                            'kadar',
                            'caj_proses',
                            'bayaran_perkhidmatan',
                            'insurans',
                            'jumlah_keseluruhan',
                            'baki',
                            'bulanan',
                            'status'
                        ];

    public function profile() {
        return $this->belongsTo('App\Profile', 'no_gaji', 'no_gaji');
    }

    public function perkhidmatan()
    {
        return $this->hasOne('App\Perkhidmatan', 'id', 'perkhidmatan_id');
    }

    public function getStatus()
    {
        return $this->hasOne('App\Status', 'id', 'status');
    }
}
