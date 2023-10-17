<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(int $parentId = null, int $depth = 0, string $countryCode = 'vn')
    {
        return Address::getByDepth($parentId,$depth,$countryCode);
    }
}
