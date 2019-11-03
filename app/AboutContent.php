<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    protected $fillable = [
        'title', 'body'
    ];
}
