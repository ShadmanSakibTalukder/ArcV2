<?php

// namespace App\Http\Livewire;

// use App\Models\AddToList;
// use App\Models\Parts_list;
// use App\Models\PurchaseOrderItem;
// use Livewire\Component;

// class PurchaseOrderShow extends Component
// {
//     public $search = '';
//     public $selection_option = '';
//     public $parts_selected;
//     public $selectedOption = '';

//     public function addToList($part_id, $qty)
//     {
//         $existingItem = AddToList::where('item_id', $part_id)->first();

//         if ($existingItem) {
//             session()->flash('message', $existingItem->parts_added_inlist->requested_nomenclature . ' already added to wishlist!');
//         } else {
//             $order_item = AddToList::create([
//                 'item_id' => $part_id,
//                 'quantity' => $qty,
//             ]);

//             $this->emit('addToListUpdated');
//             session()->flash('success_message', $order_item->parts_added_inlist->requested_nomenclature . ' added to wishlist!');
//         }
//     }
//     public function calculateUnitPrice($item)
//     {
//         if ($this->selectedOption === 'fsPrice') {
//             return $item->parts_added_inlist->fs_price;
//         } elseif ($this->selectedOption === 'surplusPrice') {
//             return $item->parts_added_inlist->surplus_price;
//         } elseif ($this->selectedOption === 'navisterPrice') {
//             return $item->parts_added_inlist->navister_price;
//         } else {
//             return 0;
//         }
//     }

//     public function render()
//     {
//         $parts_list = Parts_list::orWhere('requested_part_no', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(20);
//         $added_to_list = AddToList::all();

//         return view('livewire.purchase-order-show', ['parts_list' => $parts_list, 'added_to_list' => $added_to_list]);
//     }
// }


namespace App\Http\Livewire;

use App\Models\AddToList;
use App\Models\Parts_list;
use App\Models\purchased_order;
use App\Models\PurchaseOrderItem;
use Livewire\Component;
use Livewire\Request;

class PurchaseOrderShow extends Component
{
    public $search = '';
    public $selection_option = '';
    public $parts_selected;
    public $selectedOption = [];

    public function addToList($part_id,)
    {
        $existingItem = AddToList::where('item_id', $part_id)->first();

        if ($existingItem) {
            session()->flash('message', $existingItem->parts_added_inlist->requested_nomenclature . ' already added to wishlist!');
        } else {
            $order_item = AddToList::create([
                'item_id' => $part_id,
            ]);

            $this->emit('addToListUpdated');
            session()->flash('success_message', $order_item->parts_added_inlist->requested_nomenclature . ' added to wishlist!');
        }
    }

    public function calculateUnitPrice($item)
    {
        $unitPrice = 0;

        $selectedOption = $this->selectedOption[$item->id] ?? '';

        if ($selectedOption === 'fsPrice') {
            $unitPrice = $item->parts_added_inlist->fs_price;
        } elseif ($selectedOption === 'surplusPrice') {
            $unitPrice = $item->parts_added_inlist->surplus_price;
        } elseif ($selectedOption === 'navisterPrice') {
            $unitPrice = $item->parts_added_inlist->navister_price;
        }

        return $unitPrice;
    }

    public function calculateTotalPrice($item, $qty)
    {
        $unitPrice = $this->calculateUnitPrice($item);
        $totalPrice = $unitPrice * $qty;

        return $totalPrice;
    }
    public function save()
    {
        $validatedData = $this->validate([
            'po_no' => 'required',
            'buyer_name' => 'required',
            'buyer_address' => 'required',
            'vendor_name' => 'required',
            'vendor_address' => 'required',
            'shipping_address' => 'required',
            'tender_no' => 'required',
            'po_date' => 'required',
        ]);

        // Save the purchase order details to the database
        $purchaseOrder = purchased_order::create([
            'po_no' => $validatedData['po_no'],
            'buyer_name' => $validatedData['buyer_name'],
            'buyer_address' => $validatedData['buyer_address'],
            'vendor_name' => $validatedData['vendor_name'],
            'vendor_address' => $validatedData['vendor_address'],
            'shipping_address' => $validatedData['shipping_address'],
            'tender_no' => $validatedData['tender_no'],
            'po_date' => $validatedData['po_date'],
        ]);

        // Save the purchase order items to the database
        foreach ($this->added_to_list as $item) {
            $qty = $this->parts_selected[$item->id]['qty'] ?? 0;
            $unitPrice = $this->calculateUnitPrice($item);
            $totalPrice = $this->calculateTotalPrice($item, $qty);

            PurchaseOrderItem::create([
                'purchase_order_id' => $purchaseOrder->id,
                'item_id' => $item->id,
                'quantity' => $qty,
                'unit_price' => $unitPrice,
                'total_price' => $totalPrice,
            ]);
        }

        // Reset the form and show success message
        $this->reset();
        session()->flash('success_message', 'Purchase order created successfully!');
    }



    public function render()
    {
        $parts_list = Parts_list::orWhere('requested_part_no', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(20);
        $added_to_list = AddToList::all();

        return view('livewire.purchase-order-show', ['parts_list' => $parts_list, 'added_to_list' => $added_to_list]);
    }
}
