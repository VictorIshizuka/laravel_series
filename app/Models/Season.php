<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public $timestamps = false;

    protected $fillable = ['number'];

    public function serie()
    {
        return $this->belongsTo(Series::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
