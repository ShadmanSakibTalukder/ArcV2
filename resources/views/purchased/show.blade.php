<x-master>
    <x-slot:title>
        {{$purchased_order->po_no}}
    </x-slot:title>
    {{-- <h4>{{$purchased_order->po_no}}</h4> --}}

    <div class="company-details">
        <h2>MISSION SUPPORT LLC-FZ</h2>
        <p>Business Center 1, M-Floor, The Meydan Hotel, Nad Al Shaba, UAE</p>
        <div class="line"></div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section">
                    <h5>MISSION SUPPORT LLC-FZ</h5>
                    <p class="address-line">Business Center 1, M-Floor,</p>
                    <p class="address-line">The Meydan Hotel, Nad Al Shaba, UAE</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="section">
                    <p><span class="bold-text">Date:</span> <span class="regular-text">[Insert Date]</span></p>
                    <p><span class="bold-text">Purchased Order No:</span> <span class="regular-text">[Insert Order No]</span></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Vendor Name</h3>
                <p>Vendor Details</p>
            </div>
            <div class="col-md-6">
                <h3>Shipping Address</h3>
                <p>Shipping Details</p>
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
                            <td>[Requisitioner]</td>
                            <td>[Ship Via]</td>
                            <td>[C]</td>
                            <td>[Shipping Terms]</td>
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
                            <th>Item</th>
                            <th>Parts No</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>[Item]</td>
                            <td>[Parts No]</td>
                            <td>[Description]</td>
                            <td>[Qty]</td>
                            <td>[Unit Price]</td>
                            <td>[Total]</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Sub Total</td>
                            <td>[Sub Total Amount]</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Freight</td>
                            <td>[Freight Amount]</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Tax</td>
                            <td>[Tax Amount]</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Miscellaneous</td>
                            <td>[Miscellaneous Amount]</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Total</td>
                            <td>[Total Amount]</td>
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