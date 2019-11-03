<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_title', 'course-name', 'course_fee', 'course_image', 'publication_status'
    ];
}
