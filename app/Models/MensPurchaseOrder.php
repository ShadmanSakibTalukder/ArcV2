<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MensPurchaseOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'po_no',
        'company',
        'company_address',
        'vendor_name',
        'vendor_address',
        'shipping_address',
        'tender_no',
        'po_date',
        'total_declared_price_no',
        // Add other fillable attributes here...
    ];

    /**
     * Get the mensPurchaseOrderItem that owns the MensPurchaseOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mensPurchaseOrderItem(): HasMany
    {
        return $this->hasMany(MensPurchaseOrderItem::class, 'purchase_order_id', 'id');
    }
}
