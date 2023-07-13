<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tenders extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get all of the tenderItems for the tenders
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tenderItems(): HasMany
    {
        return $this->hasMany(TenderItem::class, 'tender_id', 'id');
    }
}
