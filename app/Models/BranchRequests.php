<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchRequests extends Model
{
    protected $primaryKey = 'request_id';
    protected $table = 'branch_requests';

    public function province_detail(){
        return $this->hasOne(
            Province::class,
            'id',
            'province_id'
        );
    }
}
