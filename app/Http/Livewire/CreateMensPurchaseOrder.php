<?php

namespace App\Http\Livewire;

use App\Models\AddToList;
use App\Models\Parts_list;
use App\Models\MensPurchaseOrder;
use App\Models\MensPurchaseOrderItem;

use Livewire\Component;

class CreateMensPurchaseOrder extends Component
{
    public $search = '';
    public $added_to_list = [];
    public $po_no, $company, $company_address, $buyer_name, $buyer_address, $vendor_name, $vendor_address, $shipping_address, $tender_no, $po_date, $subTotal, $qty = 1;

    public function addToList($part_id)
    {
        $existingItem = AddToList::where('item_id', $part_id)->first();

        if ($existingItem) {
            session()->flash('message', $existingItem->parts_added_inlist->requested_nomenclature . ' already added to wishlist!');
        } else {
            $order_item = AddToList::create([
                'item_id' => $part_id,
                'qty' => $this->qty,
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
            $this->emit('ListUpdate');
            session()->flash('success_message', 'Deleted!');
        } else {
            session()->flash('message', 'Something went wrong. Please refresh.');
            return false;
        }
    }

    public function calculateUnitPrice($item)
    {
        $unitPrice = $item->parts_added_inlist->declared_price;
        return $unitPrice;
    }

    // public function calculateTotalPrice($item, $qty)
    // {
    //     $unitPrice = $item->parts_added_inlist->declared_price;
    //     $totalPrice = $unitPrice * $qty;

    //     return $totalPrice;
    // }

    public function calculateTotalPrice($item)
    {
        // Get the qty and declared_price directly from the $item
        $qty = $item->qty;
        $declaredPrice = $item->parts_added_inlist->declared_price;

        // Calculate the total price
        $totalPrice = $qty * $declaredPrice;

        return $totalPrice;
    }



    public function savePO()
    {
        $subTotal = 0;
        foreach ($this->added_to_list as $item) {
            $qty = $this->parts_selected[$item->id]['qty'] ?? 0;
            $unitPrice = $this->calculateUnitPrice($item);
            $totalPrice = $this->calculateTotalPrice($item);
            $subTotal += $totalPrice;
        }

        $this->subTotal = $subTotal;

        $validatedData = $this->validate([
            'po_no' => 'required',
            'company' => 'required',
            'company_address' => 'required',
            'vendor_name' => 'required',
            'vendor_address' => 'required',
            'shipping_address' => 'required',
            'tender_no' => 'required',
            'po_date' => 'required',
            'subTotal' => 'required',
        ]);

        $purchaseOrder = MensPurchaseOrder::create([
            'po_no' => $validatedData['po_no'],
            'company' => $validatedData['company'],
            'company_address' => $validatedData['company_address'],
            'vendor_name' => $validatedData['vendor_name'],
            'vendor_address' => $validatedData['vendor_address'],
            'shipping_address' => $validatedData['shipping_address'],
            'tender_no' => $validatedData['tender_no'],
            'po_date' => $validatedData['po_date'],
            'total_declared_price_no' => $subTotal,
        ]);


        foreach ($this->added_to_list as $item) {
            $qty = $this->parts_selected[$item->id]['qty'] ?? 0;
            $unitPrice = $this->calculateUnitPrice($item);
            $totalPrice = $this->calculateTotalPrice($item);

            // dd($purchaseOrder->id);

            MensPurchaseOrderItem::create([
                'purchase_order_id' => $purchaseOrder->id,
                'item_id' => $item->id,
                'qty' => $qty,
                'price' => $unitPrice,
                'total_price' => $totalPrice,
            ]);
        }

        // Reset the form and show success message
        $this->reset(['po_no', 'buyer_name', 'buyer_address', 'vendor_name', 'vendor_address', 'shipping_address', 'tender_no', 'po_date', 'subTotal']);

        $this->added_to_list = [];
        session()->flash('success_message', 'Purchase order created successfully!');
    }

    public function render()
    {
        $parts_list = Parts_list::orWhere('requested_part_no', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(20);
        $this->added_to_list = AddToList::all();
        return view('livewire.create-mens-purchase-order', ['parts_list' => $parts_list, 'added_to_list' => $this->added_to_list]);
    }
}
