<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'comment_id';

    protected $fillable = ['comment_id','content', 'post_id', 'user_id' ];

    public function user()
    {
        return $this->belongsTo('App\Users', 'user_id');
    }

    public function getPost()
    {
        return $this->belongsTo('App\Posts', 'post_id');
    }
}
