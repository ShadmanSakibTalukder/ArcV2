<x-master>
    <x-slot:title>
        Profit Loss show
    </x-slot:title>
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
            <div class="col-md-12">

                <div class="card border-0">
                    <div class="card-header bg-transparent">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h2>{{$profitLoss->name}}</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <a href="{{ route('profit_loss.index') }}" class="btn btn-md btn-outline-secondary mx-2">Profit Losses</a>
                                <a href="{{ route('profit_loss.create') }}" class="btn btn-md btn-outline-secondary">Create Profit Loss Statement</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <h4>Tender/PO List</h4>
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Tender No</th>
                                <th scope="col">PO No</th>
                                <th scope="col">Total Purchased</th>
                                <th scope="col">Total Declared</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($profitLoss->profitLossItems as $item)
                            <tr>
                                <td scope="col">{{$item->purchaseOrder->tender_no }}</td>
                                <td scope="col">{{$item->purchaseOrder->po_no }}</td>
                                <td scope="col">{{$item->purchaseOrder->total_purchase_price_no }}</td>
                                <td scope="col">{{$item->purchaseOrder->total_declared_price_no }}</td>


                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">No Purchase orders available</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                    <h4>Parts List</h4>
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

                            @forelse ($profitLoss->profitLossItems as $item)
                            @forelse ($item->purchaseOrder->purchaseOrderItems as $sitem )
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
                </div>


                <div class="d-flex justify-content-between mb-3" style="background-color: rgb(179, 179, 248); color: black; padding: 8px;">
                    <p>Total Tender: {{$tenderCount}}</p>
                    <p>Total PO: {{$tenderCount}}</p>
                    <p>Total Purchase Price: {{$profitLoss->total_purchase_price}}</p>
                    <p>Total Declared: {{$profitLoss->total_declared_price}}</p>
                </div>
                @if ($profitLoss->total_purchase_price > $profitLoss->total_declared_price)
                <div class="d-flex justify-content-center mb-3" style="background-color: red; color: white; padding: 8px;">
                    <h4>Total Loss : {{$profitLoss->total_declared_price-$profitLoss->total_purchase_price}}</h4>
                </div>
                @else
                <div class="d-flex justify-content-center mb-3" style="background-color: rgb(51, 173, 51);; color: white; padding: 8px;">
                    <h4>Total Profit : {{$profitLoss->total_declared_price-$profitLoss->total_purchase_price}}</h4>
                </div>
                @endif
            </div>


        </div>
</x-master>