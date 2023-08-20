<div class="mb-5">
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
    $subTotal=0;
    $declaredTotal=0;
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
                                <td>{{ $item->qty }}</td>
                                <td>
                                    <select class="form-select sm" wire:model="selectedOption.{{ $item->id }}" wire:change="updateVendorPrices({{ $item->id }})">
                                        <option value="">Select Price</option>
                                        @forelse ($vendorPrices[$item->id] as $vendorPrice)
                                        <option value="{{ $vendorPrice->id }}">{{ $vendorPrice->price }}</option>
                                        @empty
                                        <option value="">No Price Available</option>
                                        @endforelse
                                    </select>
                                </td>
                                <td>{{ $this->calculateUnitPrice($item) }}</td>
                                <td>
                                    {{ $this->calculateTotalPrice($item) }}
                                    @php
                                    $subTotal += $this->calculateTotalPrice($item);
                                    $declaredTotal += $this->calculateDeclaredTotalPrice($item);
                                    @endphp
                                </td>
                                <td>
                                    <div class="remove">
                                        <button type="button" wire:click="removeListItem({{ $item->id }})" wire:loading.attr="disabled" class="btn btn-danger btn-sm" title="{{__('Remove')}}">
                                            <span wire:loading.remove wire:target="removeListItem({{ $item->id }})">
                                                <i class="fa fa-trash"></i>
                                            </span>
                                            <span wire:loading wire:target="removeListItem({{ $item->id }})">{{__('Removing')}}</span>
                                        </button>
                                    </div>
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

                <form wire:submit.prevent="codOrder">
                    <!-- ... Form fields ... -->
                    <div class="my-5 d-flex justify-content-end p-3">
                        <button type="submit" class="btn btn-md btn-outline-primary px-3 mx-2">
                            <span wire:loading.remove wire:target="codOrder">Save</span>
                            <span wire:loading wire:target="codOrder">Saving Purchase Order</span>
                        </button>
                        <a href="{{ route('purchased_order.index') }}" class="btn btn-md btn-outline-secondary">Back</a>
                    </div>
                </form>
            </div>
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
                                <th>QTY</th>
                                <th>Add</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($parts_list as $item)
                            <tr>
                                <td>{{ $item->requested_part_no }}</td>
                                <td>{{ $item->requested_nomenclature }}</td>
                                <td>
                                    <input type="qty" class="form-control" id="qty" wire:model="qty" name="qty">
                                </td>
                                <td>
                                    <button type="button" wire:click="addToList({{ $item->id }})" wire:loading.attr="disabled" wire:target="addToList({{ $item->id }})" class="btn btn1 rounded mb-5" title="{{__('Add To PO')}}">
                                        <span wire:loading.remove wire:target="addToList({{ $item->id }})">
                                            <i class="fa fa-plus fa-bounce"></i>
                                        </span>
                                        <span wire:loading wire:target="addToList({{ $item->id }})">{{__('Adding...')}}</span>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">No parts available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>