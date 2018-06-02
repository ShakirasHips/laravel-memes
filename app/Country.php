<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'country_id';

    protected $fillable = [
      'country_id', 'name'
    ];

    public function countries()
    {
        return $this->hasMany('App\Restaurant', 'country_id', 'country_id');
    }

    public function users()
    {
        return $this->hasMany('App\Users', 'country_id', 'country_id');
    }

    public function restaurants()
    {
        return $this->hasMany('App\Restaurant', 'country_id', 'country_id');
    }
}
