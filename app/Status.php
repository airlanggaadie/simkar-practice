<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "status";

    protected $fillable = [
        'name'
    ];

    public function employee()
    {
        $this->hasMany(Employee::class,'status_id','id');
    }
}
