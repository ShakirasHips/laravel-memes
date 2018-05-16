<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';

    protected $fillable = [
      'name'
    ];

    public function restaurants()
    {
        return $this->hasMany('App\Restaurant', 'category_id', 'category_id');
    }
}
