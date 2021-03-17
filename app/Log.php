<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'email', 'status', 'created_at', 'updated_at'
    ];
}
