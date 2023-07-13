<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseOrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_order_id',
        'item_id',
        'qty',
        'price',
        'total_price'
    ];

    /**
     * Get the parts that owns the PurchaseOrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parts(): BelongsTo
    {
        return $this->belongsTo(Parts_list::class, 'item_id', 'id');
    }
}
