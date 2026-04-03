<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Processes extends Model
{
    protected $guarded = [];
    use SoftDeletes;
}
