<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table='pages';
    protected $fillable =['id','name','content','title','user_id'];
}