<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TenderItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the tenders that owns the TenderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tenders(): BelongsTo
    {
        return $this->belongsTo(tenders::class, 'tender_id', 'id');
    }
}
