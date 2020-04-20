<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Street extends Model
{
    use SoftDeletes;

    protected $table = "street";
    protected $fillable = ["name", "barangay_id"];
    
}
