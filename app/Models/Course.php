<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


     protected $fillable = ['name',
     'description',
     'user_id',
     'thum',
     'duration',
     'price',
     'sell_price',
     
     ] ;


    function user(){
        return $this->belongsTo(User::class);
    }

    function lessons(){
        return $this->hasMany(Lessone::class);
    }


}
