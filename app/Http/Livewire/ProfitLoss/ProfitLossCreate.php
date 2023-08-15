<?php

namespace App\Http\Livewire\ProfitLoss;

use App\Models\AddToProfitLoss;
use App\Models\ProfitLoss;
use App\Models\ProfitLossItems;
use App\Models\purchased_order;
use Livewire\Component;
use Illuminate\Support\Str;

class ProfitLossCreate extends Component
{
    public $search = '';
    public $addToPLList = [];
    public $total_purchase_price, $total_declared_price;

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

    public function removeListItem($listId)
    {
        $itemInList = AddToProfitLoss::where('id', $listId)->first();
        if ($itemInList) {
            $itemInList->delete();
            $this->emit('ListUpdate');
            session()->flash('success_message', 'Deleted!');
        } else {
            session()->flash('message', 'Something went wrong. Please refresh.');
            return false;
        }
    }

    function saveProfitLoss()
    {


        $total_purchase_price = 0;
        $total_declared_price = 0;

        // Calculate the totals from the table data
        foreach ($this->addToPLList as $item) {
            $total_purchase_price += $item->purchase_orders->total_purchase_price_no;
            $total_declared_price += $item->purchase_orders->total_declared_price_no;
        }

        // Create the profit loss record
        $profitLoss = ProfitLoss::create([
            'name' => 'mens-' . Str::random(5),
            'total_purchase_price' => $total_purchase_price,
            'total_declared_price' => $total_declared_price,
            'status' => '0'
        ]);
        foreach ($this->addToPLList as $item) {
            ProfitLossItems::create([
                'profit_loss_id' => $profitLoss->id,
                'po_id' => $item->purchase_orders->id
            ]);
        }

        $total_purchase_price = 0;
        $total_declared_price = 0;

        AddToProfitLoss::query()->forceDelete();

        return true;
    }

    public function codOrder()
    {

        $codOrder = $this->saveProfitLoss();
        if ($codOrder) {
            session()->flash('success_message', 'Purchase order created successfully!');
            return redirect()->back();
        } else {
            session()->flash('message', 'Something Went Wrong!');
            return redirect()->back();
        }
    }

    public function render()
    {
        $searchPO = purchased_order::orWhere('po_no', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(20);
        $this->addToPLList = AddToProfitLoss::all();


        return view('livewire.profit-loss.profit-loss-create', ['searchPO' => $searchPO, 'addToPLList' => $this->addToPLList]);
    }
}
