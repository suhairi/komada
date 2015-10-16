<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'no_anggota';

    protected $fillable = [
        'no_anggota', 'nama', 'nokp', 'jantina', 'bangsa',
        'agama', 'email', 'alamat1', 'alamat2', 'tarikh_khidmat', 'tarikh_ahli',
        'jawatan', 'taraf_jawatan', 'status', 'profile_category_id'
    ];

    protected $dates = ['tarikh_khidmat', 'tarikh_ahli'];
    public $timestamps = false;

    public function profileCategory()
    {
        return $this->hasOne('profile_category_id');
    }
}
