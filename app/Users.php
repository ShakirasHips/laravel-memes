<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
      'name', 'email', 'password', 'country_id'
    ];

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }

    public function roles()
    {
        return $this->hasMany('App\role_user', 'user_id', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Posts', 'user_id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments', 'user_id', 'user_id');
    }
}
