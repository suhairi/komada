<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tangguh extends Model
{
    protected $table = 'tangguh';
    protected $primaryKey = 'id';

    protected $fillable = ['no_gaji', 'akaunpotongan_id', 'dari', 'sehingga'];
}
