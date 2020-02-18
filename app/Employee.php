<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','address','age','gender','email','phonenumber','bornday','positions_id','joined_at','status_id','educations_id'
    ];
}
