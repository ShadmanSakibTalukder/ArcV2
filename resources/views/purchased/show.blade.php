<x-master>
    <x-slot:title>
        {{$purchased_order->po_no}}
    </x-slot:title>
    {{-- <h4>{{$purchased_order->po_no}}</h4> --}}

    <div class="company-details">
        <h2>{{$purchased_order->company}}</h2>
        <p>{{$purchased_order->company_address}}</p>
        <div class="line"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section">
                    <h5>{{$purchased_order->company}}</h5>
                    <p>{{$purchased_order->company_address}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="section flex-end">
                    <p><span class="bold-text">Date:</span> <span class="regular-text">{{$purchased_order->po_date}}</span></p>
                    <p><span class="bold-text">Purchased Order No:</span> <span class="regular-text">{{$purchased_order->po_no}}</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>Vendor Name</h5>
                <p><strong>{{$purchased_order->vendor_name}}</strong></p>
                <p>{{$purchased_order->vendor_address}}</p>
            </div>
            <div class="col-md-6">
                <h5>Shipping Address</h5>
                <p><strong>{{$purchased_order->buyer_name}}</strong></p>
                <p>{{$purchased_order->shipping_address}}</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Requisitioner</th>
                            <th>Ship Via</th>
                            <th>C</th>
                            <th>Shipping Terms</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$purchased_order->buyer_name}}</td>
                            <td>Air Freight</td>
                            <td></td>
                            <td>CPT ( Carriage paid to Dhaka by air)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center fw-bold">Item</th>
                            <th class="text-center fw-bold">Parts No</th>
                            <th class="text-center fw-bold">Description</th>
                            <th class="text-center fw-bold">Qty</th>
                            <th class="text-center fw-bold">Unit Price</th>
                            <th class="text-center fw-bold">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($purchased_order->purchaseOrderItems as $item)
                        <tr>
                            <td{{$loop->iteration}}< /td>
                                <td>{{item->parts->name}}</td>
                                <td>{{item->parts->cat_nomenclature}}</td>
                                <td>{{item->qty}}</td>
                                <td>${{item->price}}</td>
                                <td>${{item->total_price}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">No items available</td>
                        </tr>
                        @endforelse
                        <!-- Add more rows as needed -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Sub Total</td>
                            <td class="text-end fw-bold">${{$purchased_order->total_purchase_price_no}}</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Freight</td>
                            <td class="text-end fw-bold">$0</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Tax</td>
                            <td class="text-end fw-bold">$0</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Miscellaneous</td>
                            <td class="text-end fw-bold">$0</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Total</td>
                            <td class="text-end fw-bold">${{$purchased_order->total_purchase_price_no}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-6">
                <p><span class="bold-text">Authorised By:</span></p>
            </div>
            <div class="col-md-6">
                <p> <span class="bold-text">Date:</span></p>
            </div>
        </div>
    </div>
</x-master>