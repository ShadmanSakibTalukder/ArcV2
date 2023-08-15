<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProfitLoss extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get all of the profitLossItems for the ProfitLoss
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function profitLossItems(): HasMany
    {
        return $this->hasMany(ProfitLossItems::class, 'profit_loss_id', 'id');
    }
}
