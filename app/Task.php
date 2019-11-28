<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $perPage = 50;

    protected $fillable = ['title', 'description', 'is_completed'];
}
