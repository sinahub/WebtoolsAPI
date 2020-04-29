<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branch';
    protected $fillable = ['name'];


    public function organisation()
    {
        return $this->belongsTo('App\Organisation');
    }

    public function staff()
    {
        return $this->hasMany('App\Staff');
    }
}
