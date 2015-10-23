<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jantina extends Model
{
    protected $table = 'jantina';
    protected $primaryKey = 'id';
    protected $fillable = ['nama'];

    public $timestamps = false;
}
