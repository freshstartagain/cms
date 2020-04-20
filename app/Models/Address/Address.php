<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $table = "address";
    protected $fillable = ["street_id", "barangay_id", "municipal_id", "province_id"];
}
