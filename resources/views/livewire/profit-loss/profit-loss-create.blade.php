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

    <div class="row">
        <div class="col-md-8">
            <div class="card border-0">
                <div class="card-header bg-transparent">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h2>Profit Loss</h2>
                        @php
                        $total_tender=0;
                        $total_po=0;
                        $total_purchase_price=0;
                        $total_declared_price=0;
                        @endphp

                    </div>
                    <div class="d-flex justify-content-between mb-3" style="background-color: rgb(179, 179, 248); color: black; padding: 8px;">
                        <p>Total Tender: {{$total_tender}}</p>
                        <p>Total PO: {{$total_po}}</p>
                        <p>Total Purchase Price: {{$total_purchase_price}}</p>
                        <p>Total Declared: {{$total_declared_price}}</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('profit_loss.store') }}" method="POST">
                    @csrf
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Tender No</th>
                                <th scope="col">Po No</th>
                                <th scope="col">Parts No</th>
                                <th scope="col">Description</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Purchased Price</th>
                                <th scope="col">Purchased Total</th>
                                <th scope="col">Declared Price</th>
                                <th scope="col">Declared Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total_tender=0;
                            $total_po=0;
                            $total_purchase_price=0;
                            $total_declared_price=0;
                            @endphp
                            @forelse ($addToPLList as $item)
                            @forelse ($item->purchase_orders->purchaseOrderItems as $sitem )
                            <tr>
                                <td scope="col">{{$sitem->purchaseOrder->tender_no }}</td>
                                <td scope="col">{{$sitem->purchaseOrder->po_no }}</td>
                                <td scope="col">{{$sitem->parts->requested_part_no }}</td>
                                <td scope="col">{{$sitem->parts->requested_nomenclature }}</td>
                                <td scope="col">{{$sitem->qty }}</td>
                                <td scope="col">{{$sitem->price }}</td>
                                <td scope="col">{{$sitem->total_price }}</td>
                                <td scope="col">{{$sitem->parts->declared_price }}</td>
                                <td scope="col">{{($sitem->parts->declared_price)*($sitem->qty) }}</td>

                            </tr>
                            @php

                            $total_purchase_price+=$sitem->total_price;
                            $total_declared_price+=(($sitem->parts->declared_price)*($sitem->qty));
                            @endphp
                            @empty
                            <tr>
                                <td colspan="8">No Parts Available</td>
                            </tr>
                            @endforelse
                            @empty
                            <tr>
                                <td colspan="8">No tender Available</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </form>
            </div>

            <div class="mt-4">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Tender No</th>
                            <th scope="col">Total Purchased</th>
                            <th scope="col">Total Declared</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($addToPLList as $item)
                        <tr>
                            <td scope="col">{{$item->purchase_orders->tender_no }}</td>
                            <td scope="col">{{$item->purchase_orders->total_purchase_price_no }}</td>
                            <td scope="col">{{$item->purchase_orders->total_declared_price_no }}</td>
                            <td>
                                <a href="#" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                                <a href="#" class="btn btn-sm link-warning" comment="Edit Product"><i class="fa-solid fa-pen-to-square fs-5"></i></a>
                                <form action="#" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure want to delete')"><i class="fa-solid fa-trash fs-5"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">No Purchase orders available</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <div class="search-section">
                <div class="input-group">
                    <input type="text" class="form-control" wire:model="search" placeholder="Search Purchase Order">
                    <button type="submit" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-search"></i></button>
                </div>
            </div>
            <div class="listbox-section">
                <div class="listbox">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Purchase order No</th>
                                <th>Tender No</th>
                                <th>Add</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($searchPO as $item)
                            <tr>
                                <td>{{ $item->po_no }}</td>
                                <td>{{ $item->tender_no }}</td>
                                <td>
                                    <button type="button" wire:click="addToPL({{ $item->id }})" wire:loading.attr="disabled" wire:target="addToPL({{ $item->id }})" class="btn btn1 rounded mb-5" title="{{__('Add To PO')}}">
                                        <span wire:loading.remove wire:target="addToPL({{ $item->id }})">
                                            <i class="fa fa-plus fa-bounce"></i>
                                        </span>
                                        <span wire:loading wire:target="addToPL({{ $item->id }})">{{__('Adding...')}}</span>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">No Purchase order available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>