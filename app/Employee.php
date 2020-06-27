<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name','designation','previous_station','joining_date','retirement_date','image','nid_number','current_address','permanent_address','phone', 'email','education','dob'];
    protected $table = 'employees';
}
