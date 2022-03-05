<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $guarded = [];


    public function branch(){
        return $this->belongsTo(Branch::class, 'branch_unique_id', 'unique_id');
    }


}
