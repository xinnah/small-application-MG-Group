<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Users extends Model
{
    protected $table = "users";
    protected $fillable = ['name','email','password','profile','phone_number','gender'];

    

}
