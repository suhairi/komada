<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    protected $table = 'startup';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'nilai'];
}
