<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AddToProfitLoss extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the purchase_orders that owns the AddToProfitLoss
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchase_orders(): BelongsTo
    {
        return $this->belongsTo(purchased_order::class, 'po_id', 'id');
    }
}
