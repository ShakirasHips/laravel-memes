<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role_user extends Model
{
    protected $table = 'role_user';
    protected $primaryKey = ['user_id', 'role_id'];
    public $incrementing = false;
    protected $fillable = [
      'user_id', 'role_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\Users', 'user_id');
    }

    public function test()
    {
        return $this->belongsTo('App\Roles', 'role_id');
    }
}
