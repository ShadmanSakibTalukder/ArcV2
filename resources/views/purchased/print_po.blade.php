<!DOCTYPE html>
<html>
<head>
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 1.5cm;
        }
        
        .company-details {
            margin-bottom: 1cm;
            text-align: center;
        }
        
        .line {
            height: 1px;
            background-color: #000;
            margin-top: 0.5cm;
            margin-bottom: 0.5cm;
        }
        
        .section {
            margin-bottom: 0.5cm;
        }
        
        .bold-text {
            font-weight: bold;
        }
        
        .regular-text {
            font-weight: normal;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .table th, .table td {
            padding: 0.3cm;
            border: 1px solid #000;
            text-align: center;
        }
        
        .table thead th {
            font-weight: bold;
        }
        
        .table tfoot td {
            font-weight: bold;
            text-align: right;
        }
        
        .small-text {
            font-size: 9px;
            margin-top: 0.2cm;
            margin-bottom: 0.2cm;
        }
        
        .justify-content-end {
            justify-content: flex-end;
        }
        
        .align-items-center {
            align-items: center;
        }
        
        .d-grid {
            display: grid;
        }
        
        .text-center {
            text-align: center;
        }
        
        .container {
            margin-bottom: 0.5cm;
        }
        
        .line-middle {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 0.5cm;
        }
    </style>
</head>
<body>
    <div class="company-details">
        <h2>{{$po->company}}</h2>
        <p>{{$po->company_address}}</p>
        <div class="line"></div>
    </div>
    
    <h2 class="text-center">PURCHASE ORDER</h2>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section">
                    <h5>{{$po->company}}</h5>
                    <p>{{$po->company_address}}</p>
                </div>
            </div>
            <div class="col-md-6 justify-content-end">
                <div class="section justify-content-end">
                    <p><span class="bold-text">Date:</span> <span class="regular-text">{{$po->po_date}}</span></p>
                    <p><span class="bold-text">Purchased Order No:</span> <span class="regular-text">{{$po->po_no}}</span></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section">
                    <h5>Vendor Name</h5>
                    <p><strong>{{$po->vendor_name}}</strong></p>
                    <p>{{$po->vendor_address}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="section">
                    <h5>Shipping Address</h5>
                    <p><strong>{{$po->buyer_name}}</strong></p>
                    <p>{{$po->shipping_address}}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <table class="table">
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
                    <td>{{$po->buyer_name}}</td>
                    <td>Air Freight</td>
                    <td></td>
                    <td>CPT ( Carriage paid to Dhaka by air)</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="container">
        <table class="table">
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
                @forelse ($po->purchaseOrderItems as $item)
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
                    <td colspan="6">No items available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section">
                    <p class="small-text">Special Instructions/Comments</p>
                    <p class="small-text">Shipping Mark, Address, BIN No and Work Order No to appear clearly on each page</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="section justify-content-md-end">
                    <table class="table table-bordered">
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-end fw-bold">Sub Total</td>
                                <td class="text-end fw-bold">${{$po->total_purchase_price_no}}</td>
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
                                <td class="text-end fw-bold">${{$po->total_purchase_price_no}}</td>
                            </tr>
                        </tfoot>
                    </table>
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
        <p class="small-text text-center">For more info on this purchase order, feel free to contact: missionsupport.procurement@protonmail.com</p>
    </div>
</body>
</html>
