<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'post_id';

    protected $fillable = ['content', 'restaurant_id', 'user_id' ];

    public function comments()
    {
        return $this->hasMany('App\Comments', 'post_id', 'post_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Users', 'user_id');
    }
}
