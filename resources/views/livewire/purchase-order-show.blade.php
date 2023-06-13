<div>
    @if (session()->has('message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif (session()->has('success_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @php
    $subTotal=0
    @endphp
    <h3>Create Purchase Order</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-section">

                <div class="table responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Parts No.</th>
                                <th>Nomenclature</th>
                                <th>Qty</th>
                                <th>Price By</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($added_to_list as $item)
                            <tr>
                                <td>{{ $item->parts_added_inlist->requested_part_no }}</td>
                                <td>{{ $item->parts_added_inlist->requested_nomenclature }}</td>
                                <td>
                                    <input type="number" class="form-control" wire:model="parts_selected.{{ $item->id }}.qty">
                                </td>
                                <td>
                                    <select class="form-select sm" wire:model="selectedOption">
                                        <option value="fsPrice">FS Price</option>
                                        <option value="surplusPrice">Surplus Price</option>
                                        <option value="navisterPrice">Navister Price</option>
                                    </select>
                                </td>
                                <td>
                                    {{ $this->calculateUnitPrice($item) }}
                                </td>
                                <td>
                                    @if (isset($parts_selected[$item->id]) && isset($parts_selected[$item->id]['qty']))
                                    {{ $this->calculateTotalPrice($item, $parts_selected[$item->id]['qty']) }}
                                    @php
                                    $subTotal+= $this->calculateTotalPrice($item, $parts_selected[$item->id]['qty'])
                                    @endphp
                                    @else
                                    0
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No items added yet.</td>
                            </tr>
                            @endforelse



                            <tr>
                                <td colspan="5">
                                    <h6>Total Price:</h6>
                                </td>
                                <td colspan="1">
                                    <h4>{{ $subTotal }}</h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>
                <div class="mb-3">
                    <label for="po_no" class="form-label">Purchase Order No:</label>
                    <input type="text" class="form-control" id="po_no" name="po_no">
                </div>
                <div class="mb-3">
                    <label for="buyer_name" class="form-label">Buyer Name:</label>
                    <input type="text" class="form-control" id="buyer_name" name="buyer_name">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Buyer Address</label>
                    <textarea name="buyer_address" id="buyer_address" class="form-control" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="vendor_name" class="form-label">Vendor Name:</label>
                    <input type="text" class="form-control" id="vendor_name" name="vendor_name">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Buyer Address</label>
                    <textarea name="vendor_address" id="vendor_address" class="form-control" rows="2"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label>Shipping Address</label>
                    <textarea name="shipping_address" id="shipping_address" class="form-control" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="tender_no" class="form-label">Tender No:</label>
                    <input type="text" class="form-control" id="tender_no" name="tender_no">
                </div>

                <div class="mb-3">
                    <label for="po_date" class="form-label">Purchase Order Date:</label>
                    <input type="date" class="form-control" id="po_date" name="po_date">
                </div>
            </div>

            <button type="button" class="btn btn-md btn-outline-primary py-3 mx-2 mb-5">Save</button>
        </div>
        <div class="col-md-6">
            <div class="search-section">
                <div class="input-group">
                    <input type="text" class="form-control" wire:model="search" placeholder="Search parts">
                    <button type="submit" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-search"></i></button>
                </div>
            </div>
            <div class="listbox-section">
                <div class="listbox">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Parts No.</th>
                                <th>Nomenclature</th>
                                <th>Add</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($parts_list as $item)
                            <tr>
                                <td>{{ $item->requested_part_no }}</td>
                                <td>{{ $item->requested_nomenclature }}</td>
                                <td>
                                    <button type="button" wire:click="addToList({{ $item->id }}, 1)" wire:loading.attr="disabled" wire:target="addToList_{{ $item->id }}" class="btn btn1 rounded" title="{{__('Add To PO')}}">
                                        <span wire:loading.remove wire:target="addToList_{{ $item->id }}">
                                            <i class="fa-solid fa-plus fa-bounce"></i>
                                        </span>
                                        <span wire:loading wire:target="addToList_{{ $item->id }}">{{__('Adding...')}}</span>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">No parts Available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>