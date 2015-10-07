<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perkhidmatan extends Model
{

    protected $table = 'perkhidmatan';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'catatan'];

    public $timestamps = false;
}
