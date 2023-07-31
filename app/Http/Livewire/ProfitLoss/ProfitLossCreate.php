<?php

namespace App\Http\Livewire\ProfitLoss;

use App\Models\purchased_order;
use Livewire\Component;

class ProfitLossCreate extends Component
{

    public $search = '';
    public function render()
    {
        $searchPO = purchased_order::orWhere('po_no', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(20);
        return view('livewire.profit-loss.profit-loss-create', compact('searchPO'));
    }
}
