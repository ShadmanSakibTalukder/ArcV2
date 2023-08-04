<?php

namespace App\Http\Livewire\ProfitLoss;

use App\Models\AddToProfitLoss;
use App\Models\purchased_order;
use Livewire\Component;

class ProfitLossCreate extends Component
{
    public $search = '';

    public function addToPL($p_id)
    {
        $existingItem = AddToProfitLoss::where('po_id', $p_id)->first();

        if ($existingItem) {
            session()->flash('message', $existingItem->parts_added_inlist->requested_nomenclature . ' already added to wishlist!');
        } else {
            $order_item = AddToProfitLoss::create([
                'po_id' => $p_id,
            ]);

            $this->emit('addToListUpdated');
            session()->flash('success_message', $order_item->parts_added_inlist->requested_nomenclature . ' added to wishlist!');
        }
    }
    public function render()
    {
        $searchPO = purchased_order::orWhere('po_no', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(20);
        return view('livewire.profit-loss.profit-loss-create', compact('searchPO'));
    }
}
