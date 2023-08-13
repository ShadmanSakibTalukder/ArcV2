<?php

namespace App\Http\Livewire\ProfitLoss;

use App\Models\AddToProfitLoss;
use App\Models\purchased_order;
use Livewire\Component;

class ProfitLossCreate extends Component
{
    public $search = '';
    public $addToPLList = [];

    public function addToPL($p_id)
    {
        $existingItem = AddToProfitLoss::where('po_id', $p_id)->first();

        if ($existingItem) {
            session()->flash('message', $existingItem->purchase_orders->po_no . ' already added to wishlist!');
        } else {
            $ordered_po = AddToProfitLoss::create([
                'po_id' => $p_id,
            ]);

            $this->emit('addToListUpdated');
            session()->flash('success_message', $ordered_po->purchase_orders->po_no . ' added to wishlist!');
        }
    }
    public function render()
    {
        $searchPO = purchased_order::orWhere('po_no', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(20);
        $this->addToPLList = AddToProfitLoss::all();


        return view('livewire.profit-loss.profit-loss-create', ['searchPO' => $searchPO, 'addToPLList' => $this->addToPLList]);
    }
}
