<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parts_list extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the vendorPrice for the Parts_list
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vendorPrice(): HasMany
    {
        return $this->hasMany(vendorPrice::class, 'part_id', 'id');
    }
}
