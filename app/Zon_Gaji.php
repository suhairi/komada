<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zon_Gaji extends Model
{
    protected $table = 'zon_gaji';
    protected $primaryKey = 'id';
    protected $fillable = ['kod', 'nama'];

    public $timestamps = false;
}
