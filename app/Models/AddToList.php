<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AddToList extends Model
{
    use HasFactory;
    protected $guarded = [];


    /**
     * Get the parts_added_inlist that owns the AddToList
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parts_added_inlist(): BelongsTo
    {
        return $this->belongsTo(Parts_list::class, 'item_id', 'id');
    }
}
