<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessone extends Model
{
    use HasFactory;

    protected $fillable = [
            'name',
            'description',
            'video',
            'course_id'
    ];

    function course(){
        return $this->belongsTo(Course::class);
    }




    
}
