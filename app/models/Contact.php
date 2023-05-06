<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table='contact_us';
    protected $fillable =['id','username','email','phone','content','created_at'];
}