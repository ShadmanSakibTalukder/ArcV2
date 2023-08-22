<?php

namespace App\Http\Livewire\Invoice;

use App\Models\purchased_order;
use Livewire\Component;

class CreateInvoice extends Component
{
    public function render()
    {
        $purchaseOrder = purchased_order::all();
        return view('livewire.invoice.create-invoice', compact('purchaseOrder'));
    }
}
