<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = array('id', 'first_name','last_name','email','phone','address','username','password','dob','gender');
}
