<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function threads()
    {

        // a channel Has Many( this has) Threads
        return $this->hasMany(Thread::class);
    }
}
