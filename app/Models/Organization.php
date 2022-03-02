<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
   use HasFactory;
    protected $table = 'organizations';
    protected $guarded = [];

    public function branches(){
        return $this->hasMany(Branch::class, 'organization_unique_id', 'unique_id');
    }

}
