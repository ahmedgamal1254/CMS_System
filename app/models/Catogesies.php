<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Catogesies extends Model
{
    protected $table='catogeries';
    protected $fillable =['id','name','description'];
}
