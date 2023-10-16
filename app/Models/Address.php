<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'country_code',
        'name',
        'depth',
        'parent_id',
    ];

    public static function getByDepth(int $parentId = null, int $depth = 0, string $countryCode = 'vn'): Collection
    {
        return Address::where('country_code', $countryCode)
            ->where('depth', $depth)
            ->where('parent_id', $parentId)
            ->select(['id','name','depth','parent_id'])
            ->get();
    }

    public static function getNames(array $ids): array
    {
        return Address::whereIn('id', $ids)
            ->pluck('name')
            ->toArray();
    }

    public static function random(int $parentId = null, int $depth = 0, string $countryCode = 'vn'): Address
    {
        return Address::where('country_code', $countryCode)
            ->where('depth', $depth)
            ->where('parent_id', $parentId)
            ->first();
    }

    public function children(): HasMany
    {
        return $this->hasMany(Address::class, 'parent_id');
    }
}
