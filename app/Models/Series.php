<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $table = 'series';

    protected $fillable = [
        'nome',
        'cover'
    ];

    protected $appends = [
        'links'
    ];


    public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id');
    }

    public function links(): Attribute
    {
        return Attribute::make(get: fn() => [
            [
                'rel' => 'self',
                'url' => "/api/series/{$this->id}"
            ],
            [
                'rel' => 'episodes',
                'url' => "/api/series/{$this->id}/episodes"
            ],
            [
                'rel' => 'seasons',
                'url' => "/api/series/{$this->id}/seasons"
            ],
        ],);
    }

    public function episodes()
    {
        return $this->hasManyThrough(Episode::class, Season::class, 'series_id', 'season_id');
    }

    //escopo global
    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('nome');
        });
    }
}
