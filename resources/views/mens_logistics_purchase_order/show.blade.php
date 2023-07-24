<x-master>
    <x-slot:title>
        {{$mensPurchaseOrder->po_no}}
    </x-slot:title>

    <div class="company-details">
        <h2>{{$mensPurchaseOrder->company}}</h2>
        <p>{{$mensPurchaseOrder->company_address}}</p>
        <div class="line"></div>
    </div>

    <h2 class="text-center">PURCHASE ORDER</h2>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="box" style="max-width: 400px;">
                    <h5>{{$mensPurchaseOrder->company}}</h5>
                    <div class="d-flex align-items-center">
                        <p style="flex: 1;">{{$mensPurchaseOrder->company_address}}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box" style="max-width: 400px;">
                    <div class="section d-flex justify-content-end align-items-center">
                        <p><span class="bold-text">Date:</span></p>
                        <p><span class="regular-text">{{$mensPurchaseOrder->po_date}}</span></p>
                    </div>
                    <div class="section d-flex justify-content-end align-items-center">
                        <p><span class="bold-text">Purchased Order No:</span></p>
                        <p><span class="regular-text">{{$mensPurchaseOrder->po_no}}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>Vendor Name</h5>
                <div class="card mb-3 border-0" style="width: 100%;">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <strong>{{$mensPurchaseOrder->vendor_name}}</strong>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="card-text">{{$mensPurchaseOrder->vendor_address}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h5>Shipping Address</h5>
                <div class="card mb-3 border-0" style="width: 100%;">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <strong>{{$mensPurchaseOrder->buyer_name}}</strong>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="card-text">{{$mensPurchaseOrder->shipping_address}}</p>
                        </div>
                    </div>
                </div>
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
                            <td>{{$mensPurchaseOrder->buyer_name}}</td>
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
                        @if($mensPurchaseOrder->mensPurchaseOrderItem)
                        @forelse ($mensPurchaseOrder->mensPurchaseOrderItem as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->parts->cat_part_no}}</td>
                            <td>{{$item->parts->cat_nomenclature}}</td>
                            <td>{{$item->qty}}</td>
                            <td>${{$item->price}}</td>
                            <td>${{$item->total_price}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">No items found.</td>
                        </tr>
                        @endforelse
                        @else
                        <tr>
                            <td colspan="6">No items found.</td>
                        </tr>
                        @endif

                    </tbody>
                </table>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="small-text">Special Instructions/Comments</p>
                            <p class="small-text">Shipping Mark, Address, BIN No and Work Order No to appear clearly on each page</p>
                        </div>
                        <div class="col-md-6 d-grid justify-content-md-end">
                            <table class="table table-bordered">
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-end fw-bold">Sub Total</td>
                                        <td class="text-end fw-bold">${{$mensPurchaseOrder->total_declared_price_no}}</td>
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
                                        <td class="text-end fw-bold">${{$mensPurchaseOrder->total_declared_price_no}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
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

        <div class="line"></div>
        <p class="small-text align-middle text-center">For more info on this purchase order, feel free to contact: missionsupport.procurement@protonmail.com</p>
    </div>



</x-master>