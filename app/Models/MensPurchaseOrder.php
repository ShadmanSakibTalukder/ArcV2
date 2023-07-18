<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MensPurchaseOrder extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the mensPurchaseOrderItem that owns the MensPurchaseOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mensPurchaseOrderItem(): BelongsTo
    {
        return $this->belongsTo(MensPurchaseOrderItem::class, 'order_id', 'id');
    }
}
