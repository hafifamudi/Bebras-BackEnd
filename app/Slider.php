<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = [];
    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
