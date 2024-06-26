<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table = 'complaints';
    protected $primaryKey = 'complaint_id';

    public function branch(){
        return $this->hasOne(Branch::class, 'branch_id', 'branch_id');
    }
}
