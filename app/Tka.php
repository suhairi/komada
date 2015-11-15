<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tka extends Model
{
    protected $table = 'tka';
    protected $primaryKey = 'id';
    protected $fillable = ['jumlah', 'status'];
}
