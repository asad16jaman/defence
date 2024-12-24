<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedack extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id','course_id','message'];

    function course(){
        return $this->belongsTo(Course::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
}
