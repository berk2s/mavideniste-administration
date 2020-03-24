<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branch';
    protected $primaryKey = 'branch_id';

    public function get_province(){
        return $this->hasOne(Province::class, 'id', 'branch_province');
    }

    public function get_county(){
        return $this->hasOne(County::class, 'id', 'branch_county');
    }

    public function opereators(){
        return $this->hasMany(
            User::class,
            'user_branch',
            'branch_id'
        )->where([['user_branch', auth()->user()->user_branch], ['is_ghost', false]]);
    }
}
