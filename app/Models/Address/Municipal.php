<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipal extends Model
{
    use SoftDeletes;

    protected $table = "municipal";
    protected $fillable = ["name", "zipcode", "province_id"];
}
