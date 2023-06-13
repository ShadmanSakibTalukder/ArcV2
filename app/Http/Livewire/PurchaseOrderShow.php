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
use App\Models\PurchaseOrderItem;
use Livewire\Component;

class PurchaseOrderShow extends Component
{
    public $search = '';
    public $selection_option = '';
    public $parts_selected;
    public $selectedOption = '';

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

        if ($this->selectedOption === 'fsPrice') {
            $unitPrice = $item->parts_added_inlist->fs_price;
        } elseif ($this->selectedOption === 'surplusPrice') {
            $unitPrice = $item->parts_added_inlist->surplus_price;
        } elseif ($this->selectedOption === 'navisterPrice') {
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

    public function render()
    {
        $parts_list = Parts_list::orWhere('requested_part_no', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(20);
        $added_to_list = AddToList::all();

        return view('livewire.purchase-order-show', ['parts_list' => $parts_list, 'added_to_list' => $added_to_list]);
    }
}
