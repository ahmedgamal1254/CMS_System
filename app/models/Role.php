<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';
    protected $fillable =['id','name','num'];

    public function role(){
        return $this->hasMany('App\User','user_id');
    }
}
