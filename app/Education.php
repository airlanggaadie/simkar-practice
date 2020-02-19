<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';

    protected $fillable = [
        'name'
    ];

    public function employee()
    {
        return $this->hasMany(Employee::class,'educations_id','id');
    }
}
