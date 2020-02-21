<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'user_logs';
    protected $primaryKey = 'log_id';
}
