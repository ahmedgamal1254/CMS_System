<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';
    protected $fillable =['id','email','name','content','active','user_id','post_id','soft_delete'];
}
