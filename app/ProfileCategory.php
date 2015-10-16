<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileCategory extends Model
{
    protected $table = 'profile_category';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'catatan'];

    public $timestamps = false;
}
