<?php

namespace App\Http\Livewire;

use App\Models\Parts_list;
use Livewire\Component;

class PurchaseOrderShow extends Component
{
    public $search = '';
    public function render()
    {
        $parts = Parts_list::orWhere('requested_part_no', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(20);
        return view('livewire.purchase-order-show', ['parts' => $parts]);
    }
}
