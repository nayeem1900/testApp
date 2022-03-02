<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $guarded = [];

    public function organiztion(){
        return $this->belongsTo(Organization::class, 'organization_unique_id', 'unique_id');
    }
}
