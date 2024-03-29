<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MensPurchaseOrderItem extends Model
{
    use HasFactory;
    protected $guarded = [];

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
