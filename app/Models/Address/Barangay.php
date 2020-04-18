<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barangay extends Model
{
    use SoftDeletes;

    protected $table = "barangay";
    protected $fillable = ["name", "municipal_id"];
    
}
