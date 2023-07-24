<?php

namespace App\Http\Livewire;

use App\Models\AddToTenderList;
use App\Models\Parts_list;
use App\Models\TenderItem;
use App\Models\tenders;
use Livewire\Component;

class CreateTender extends Component
{
    public $search = '';
    public $added_to_tender_list = [];
    public $tender_no, $issue_date, $orderd_by, $part_no, $nomenclature, $qty;

    public function addToList($part_id)
    {
        $existingItem = AddToTenderList::where('part_no', $this->part_no)->first();

        if ($existingItem) {
            session()->flash('message', $existingItem->nomenclature . ' already added to wishlist!');
        } else {
            $validateData = $this->validate([
                'part_no' => 'required',
                'nomenclature' => 'required',
                'qty' => 'required',
            ]);

            $order_item = AddToTenderList::create([
                'part_no' => $validateData['part_no'],
                'nomenclature' => $validateData['nomenclature'],
                'qty' => $validateData['qty'],
            ]);

            $this->emit('addToTenderListUpdated');
            session()->flash('success_message', $order_item->nomenclature . ' added to wishlist!');
        }
    }

    public function removeListItem($listId)
    {
        $itemInList = AddToTenderList::where('id', $listId)->first();
        if ($itemInList) {
            $itemInList->delete();
            $this->emit('ListUpdate');
            session()->flash('success_message', 'Deleted!');
        } else {
            session()->flash('message', 'Something went wrong. Please refresh.');
            return false;
        }
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

        foreach ($this->added_to_tender_list as $item) {
            TenderItem::create([
                'tender_id' => $tender->id,
                'part_no' => $item->part_no,
                'nomenclature' => $item->nomenclature,
                'qty' => $item->qty
            ]);
        }

        $this->reset(['tender_no', 'issue_date', 'orderd_by']);
    }

    public function codOrder()
    {
        $codOrder = $this->saveTender();
        if ($codOrder) {
            AddToTenderList::query()->forceDelete();
            session()->flash('success_message', 'Purchase order created successfully!');
            return redirect()->back();
        } else {
            // session()->flash('message', 'Something Went Wrong!');
            return redirect()->back();
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
        $this->added_to_tender_list = AddToTenderList::all();
        return view('livewire.create-tender', ['parts_list' => $parts_list, 'added_to_tender_list' => $this->added_to_tender_list]);
    }
}
