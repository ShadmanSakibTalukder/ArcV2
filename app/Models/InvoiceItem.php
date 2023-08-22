<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Get all of the parts for the InvoiceItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parts(): HasMany
    {
        return $this->hasMany(Parts_list::class, 'item_id', 'id');
    }

    /**
     * Get the invoices that owns the InvoiceItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoices(): BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }
}
