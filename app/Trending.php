<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trending extends Model
{
    public $timestamps = false;
    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
