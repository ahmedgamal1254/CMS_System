<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $table='themes';
    protected $fillable =['id','img','active','name','user_id','description'];
}
