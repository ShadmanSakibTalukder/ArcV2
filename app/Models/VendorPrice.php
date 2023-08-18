<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VendorPrice extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get all of the parts for the VendorPrice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parts(): HasMany
    {
        return $this->hasMany(Parts_list::class, 'part_id', 'id');
    }

    /**
     * Get all of the vendor for the VendorPrice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendorName(): BelongsTo
    {
        return $this->belongsTo(vendors::class, 'vendor_id', 'id');
    }
}
