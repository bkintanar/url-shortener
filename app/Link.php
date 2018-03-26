<?php

namespace URLShortener;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'original', 'shorten', 'description', 'user_id',
    ];

    public function getRouteKeyName()
    {
        return 'shorten';
    }
}
