<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Address\Barangay;
use App\Address\Municipal;
use App\Address\Province;
use App\Address\Region;
use App\Address\Street;

class AddressController extends Controller
{
    public function street(){
        return "Street";
    }
 
    public function barangay(){
        return "Barangay";
    }
 
    public function municipal(){
        return "Municipal";
    }
 
    public function province(){
        return "Province";
    }
 
    public function region(){
        return "Region";
    }
}
