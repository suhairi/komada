<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yurantambahan extends Model
{
    protected $table = 'yuranTambahan';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'jumlah', 'catatan', 'created_at', 'updated_at'];

}
