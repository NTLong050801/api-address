<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Address::getByDepth();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $parentId = null, int $depth = 0, string $countryCode = 'vn')
    {
        return Address::getByDepth($parentId,$depth,$countryCode);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $parentId, int $depth, string $countryCode = 'vn')
    {
       return Address::getByDepth($parentId,$depth,$countryCode);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
