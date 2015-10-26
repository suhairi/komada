<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'no_anggota';

    protected $fillable = [
        'no_gaji', 'no_anggota', 'jumlah_yuran_bulanan', 'jumlah_pertaruhan', 'nama', 'nokp', 'jantina_id', 'bangsa',
        'agama', 'email', 'alamat1', 'alamat2', 'tarikh_khidmat', 'tarikh_ahli',
        'jawatan', 'taraf_jawatan', 'status', 'profile_category_id', 'zon_gaji_id'
    ];

    protected $dates = ['tarikh_khidmat', 'tarikh_ahli'];
    public $timestamps = false;

    public function jantina()
    {
        return $this->hasOne('App\Jantina', 'id', 'jantina_id');
    }
    public function profileCategory()
    {
        return $this->hasOne('App\ProfileCategory', 'id', 'profile_category_id');
    }

    public function zon()
    {
        return $this->hasOne('App\Zon', 'id', 'zon_gaji_id');
    }
}
