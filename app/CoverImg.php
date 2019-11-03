<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoverImg extends Model
{
    protected $fillable = [
        'title', 'body', 'btnText', 'coverImg'
    ];
}
