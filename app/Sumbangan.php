<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sumbangan extends Model
{
    protected $table = 'sumbangan';
    protected $primaryKey = 'id';
    protected $fillable = ['nama'];
}
