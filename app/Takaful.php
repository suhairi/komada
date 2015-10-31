<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Takaful extends Model
{
    protected $table = 'takaful';
    protected $primaryKey = 'id';
    protected $fillable = ['jumlah', 'status'];
    public $timestamps = false;

    public function getStatus()
    {
        return $this->hasOne('App\Status', 'id', 'status');
    }
}
