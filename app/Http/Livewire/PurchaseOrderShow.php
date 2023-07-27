<?php

namespace App\Http\Livewire;

use App\Models\AddToList;
use App\Models\Parts_list;
use App\Models\purchased_order;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use Livewire\Component;

class PurchaseOrderShow extends Component
{
    public $search = '';
    public $selectedOption = [];
    public $parts_selected = [];
    public $added_to_list = [];
    public $addToCartQuantities = [];
    public $po_no, $company, $company_address, $buyer_name, $buyer_address, $vendor_name, $qty, $vendor_address, $shipping_address, $tender_no, $po_date, $subTotal;

    // public function addToList($part_id)
    // {
    //     $existingItem = AddToList::where('item_id', $part_id)->first();

    //     if ($existingItem) {
    //         session()->flash('message', $existingItem->parts_added_inlist->requested_nomenclature . ' already added to wishlist!');
    //     } else {
    //         $order_item = AddToList::create([
    //             'item_id' => $part_id,
    //             'qty' => $this->qty
    //         ]);

    //         $this->emit('addToListUpdated');
    //         session()->flash('success_message', $order_item->parts_added_inlist->requested_nomenclature . ' added to wishlist!');
    //     }
    // }

    public function addToList($part_id)
    {
        $existingItem = AddToList::where('item_id', $part_id)->first();

        if ($existingItem) {
            session()->flash('message', $existingItem->parts_added_inlist->requested_nomenclature . ' already added to wishlist!');
        } else {
            $qty = $this->addToCartQuantities[$part_id] ?? 0;

            $order_item = AddToList::create([
                'item_id' => $part_id,
                'qty' => $this->parts_selected[$part_id]['qty'] ?? 0,
            ]);

            $this->emit('addToListUpdated');
            session()->flash('success_message', $order_item->parts_added_inlist->requested_nomenclature . ' added to wishlist!');
        }
    }



    public function removeListItem($listId)
    {
        $itemInList = AddToList::where('id', $listId)->first();
        if ($itemInList) {
            $itemInList->delete();

            unset($this->parts_selected[$itemInList->item_id]);
            $this->emit('ListUpdate');
            session()->flash('success_message', 'Deleted!');
        } else {
            session()->flash('message', 'Something went wrong. Please refresh.');
            return false;
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

    public function updateTotalPrice($itemId)
    {
        foreach ($this->added_to_list as $item) {
            if ($item['item_id'] == $itemId) {
                $qty = $this->parts_selected[$itemId]['qty'] ?? 0;
                $totalPrice = $this->calculateTotalPrice($item, $qty);

                // Update the total price in the $parts_selected array
                $this->parts_selected[$itemId]['totalPrice'] = $totalPrice;

                // Recalculate the subTotal
                // $this->subTotal = collect($this->parts_selected)->sum('totalPrice');

                break;
            }
        }
    }



    // public function calculateTotalPrice($item, $qty)
    // {
    //     $unitPrice = $this->calculateUnitPrice($item);
    //     $totalPrice = $unitPrice * $qty;

    //     return $totalPrice;
    // }

    public function calculateTotalPrice($item)
    {
        $qty = $this->parts_selected[$item->id]['qty'] ?? 0;
        $selectedOption = $this->selectedOption[$item->id] ?? '';

        $unitPrice = 0;
        if ($selectedOption === 'fsPrice') {
            $unitPrice = $item->parts_added_inlist->fs_price;
        } elseif ($selectedOption === 'surplusPrice') {
            $unitPrice = $item->parts_added_inlist->surplus_price;
        } elseif ($selectedOption === 'navisterPrice') {
            $unitPrice = $item->parts_added_inlist->navister_price;
        }

        $totalPrice = $unitPrice * $qty;

        return $totalPrice;
    }


    public function savePO()
    {
        $subTotal = 0;
        foreach ($this->added_to_list as $item) {
            $qty = $this->parts_selected[$item->id]['qty'] ?? 0;
            $unitPrice = $this->calculateUnitPrice($item);
            $totalPrice = $this->calculateTotalPrice($item, $qty);
            $subTotal += $totalPrice;
        }

        $this->subTotal = $subTotal;
        // dd($subTotal);

        $validatedData = $this->validate([
            'po_no' => 'required',
            'company' => 'required',
            'company_address' => 'required',
            'buyer_name' => 'required',
            'buyer_address' => 'required',
            'vendor_name' => 'required',
            'vendor_address' => 'required',
            'shipping_address' => 'required',
            'tender_no' => 'required',
            'po_date' => 'required',
            'subTotal' => 'required',
        ]);

        $purchaseOrder = purchased_order::create([
            'po_no' => $validatedData['po_no'],
            'company' => $validatedData['company'],
            'company_address' => $validatedData['company_address'],
            'buyer_name' => $validatedData['buyer_name'],
            'buyer_address' => $validatedData['buyer_address'],
            'vendor_name' => $validatedData['vendor_name'],
            'vendor_address' => $validatedData['vendor_address'],
            'shipping_address' => $validatedData['shipping_address'],
            'tender_no' => $validatedData['tender_no'],
            'po_date' => $validatedData['po_date'],
            'total_purchase_price_no' => $subTotal,
        ]);


        foreach ($this->added_to_list as $item) {
            $qty = $this->parts_selected[$item->id]['qty'] ?? 0;
            $unitPrice = $this->calculateUnitPrice($item);
            $totalPrice = $this->calculateTotalPrice($item, $qty);

            // dd($purchaseOrder->id);

            PurchaseOrderItem::create([
                'purchase_order_id' => $purchaseOrder->id,
                'item_id' => $item->id,
                'qty' => $qty,
                'price' => $unitPrice,
                'total_price' => $totalPrice,
            ]);
        }

        // Reset the form and show success message
        $this->reset(['po_no', 'buyer_name', 'buyer_address', 'vendor_name', 'vendor_address', 'shipping_address', 'tender_no', 'po_date', 'subTotal']);
        $this->parts_selected = [];
        $this->added_to_list = [];
        session()->flash('success_message', 'Purchase order created successfully!');
    }



    public function render()
    {
        $parts_list = Parts_list::orWhere('requested_part_no', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(20);
        $this->added_to_list = AddToList::all();
        foreach ($this->added_to_list as $item) {
            // $this->parts_selected[$item->id]['qty'] = $item->qty;
            // $this->parts_selected[$item->id]['qty'] = 0;
            $this->addToCartQuantities[$item->id] = 0;
        }

        return view('livewire.purchase-order-show', ['parts_list' => $parts_list, 'added_to_list' => $this->added_to_list]);
    }
}
