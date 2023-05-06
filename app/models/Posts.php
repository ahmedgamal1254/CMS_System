<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table='posts';
    protected $fillable =['id','title','tags','content','img','created_at','cat_id','users_id','soft_delete'];
}
