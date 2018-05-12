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
        return $this->belongsToMany('App\roles');
    }
}
