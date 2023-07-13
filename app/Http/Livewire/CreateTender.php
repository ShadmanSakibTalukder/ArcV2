<?php

namespace App\Http\Livewire;

use App\Models\AddToList;
use App\Models\Parts_list;
use App\Models\TenderItem;
use App\Models\tenders;
use Livewire\Component;

class CreateTender extends Component
{
    public $search = '';
    public $selectedOption = [];
    public $parts_selected = [];
    public $added_to_list = [];
    public $tender_no, $issue_date, $orderd_by;

    public function addToList($part_id)
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
    function saveTender()
    {
        $validateData = $this->validate([
            'tender_no' => 'required',
            'issue_date' => 'required',
            'orderd_by' => 'min:4'
        ]);

        $tender = tenders::create([
            'tender_no' => $validateData['tender_no'],
            'issue_date' => $validateData['issue_date'],
            'orderd_by' => $validateData['orderd_by']
        ]);

        foreach ($this->added_to_list as $item) {
            $qty = $this->parts_selected[$item->id]['qty'] ?? 0;
            TenderItem::create([
                'tender_id' => $tender->id,
                'item_id' => $item->id,
                'qty' => $qty
            ]);
        }

        $this->reset(['tender_no', 'issue_date', 'orderd_by']);
        $this->parts_selected = [];
        // session()->flash('success_message', 'Purchase order created successfully!');
    }

    public function codOrder()
    {
        $codOrder = $this->saveTender();
        if ($codOrder) {
            AddToList::truncate();
            session()->flash('success_message', 'Purchase order created successfully!');
            return redirect()->back();
        } else {
            session()->flash('message', 'Something Went Wrong!');
            return false;
        }
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
        $this->added_to_list = AddToList::all();
        return view('livewire.create-tender', ['parts_list' => $parts_list, 'added_to_list' => $this->added_to_list]);
    }
}
