<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use Favoritable;
    use RecordsActivity;

    protected $guarded =[];

    protected $with =['owner','favorites'];

    // when i cast this model to array or json
    // appends any attributes i want here
    protected $appends = ['favoritesCount','isFavorited'];


    public function owner()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);

    }

    public function path()
    {
        return $this->thread->path(). "#reply-$this->id";
    }


}

