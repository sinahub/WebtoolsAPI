<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $table = 'organisation';
    protected $fillable = ['name'];

    public function branches()
    {
        return $this->hasMany('App\Branch');
    }
}
