<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfitLossItems extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the purchaseOrder that owns the ProfitLossItems
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(purchased_order::class, 'po_id', 'id');
    }
}
