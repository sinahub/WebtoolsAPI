<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    protected $fillable = ['name'];

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }
}
