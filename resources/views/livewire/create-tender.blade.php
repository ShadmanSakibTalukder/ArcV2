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
    $subTotal=0;
    @endphp
    <h3>Create Tender</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-section">
                <div class="table responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Parts No.</th>
                                <th>Nomenclature</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($added_to_tender_list as $item)

                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $item->part_no }}</td>
                                <td>{{ $item->nomenclature }}</td>
                                <td>{{ $item->qty }}</td>

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

                        </tbody>
                    </table>
                </div>
                <form wire:submit.prevent="codOrder">
                    <div class="mb-3">
                        <label for="tender_no" class="form-label">Tender No:</label>
                        <input type="text" class="form-control" id="tender_no" wire:model.defer="tender_no" name="tender_no">
                    </div>
                    <div class="mb-3">
                        <label for="issue_date" class="form-label">Issue Date</label>
                        <input type="date" class="form-control" id="issue_date" wire:model.defer="issue_date" name="issue_date">
                    </div>
                    <div class="mb-3">
                        <label for="orderd_by" class="form-label">Ordered By</label>
                        <input type="text" class="form-control" id="orderd_by" wire:model.defer="orderd_by" name="issue_date">
                    </div>
            </div>
            <button type="submit" class="btn btn-primary">
                <span wire:loading.remove wire:target="codOrder">Save</span>
                <span wire:loading wire:target="codOrder">Saving Tender</span>
            </button> <a class="btn btn-danger mx-5" href="{{route('tenders.index')}}">
                Back
            </a>
            </form>
        </div>
        <div class="col-md-6">
            <!-- <div class="search-section">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search parts">
                    <button type="submit" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-search"></i></button>
                </div>
            </div> -->
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
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="part_no" wire:model.defer="part_no" name="part_no">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="nomenclature" wire:model.defer="nomenclature" name="nomenclature">
                                </td>
                                <td>
                                    <input type="qty" class="form-control" id="qty" wire:model.defer="qty" name="qty">
                                </td>
                                <td>
                                    <button type="button" wire:click="addToList()" wire:loading.attr="disabled" wire:target="addToList({{ $part_no }})" class="btn btn1 rounded mb-5" title="{{__('Add To PO')}}">
                                        <span wire:loading.remove wire:target="addToList({{ $part_no }})">
                                            <i class="fa fa-plus fa-bounce"></i>
                                        </span>
                                        <span wire:loading wire:target="addToList({{ $part_no }})">{{__('Adding...')}}</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>