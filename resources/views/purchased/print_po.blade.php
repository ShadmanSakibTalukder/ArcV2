<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 1.5cm;
            font-size: 10px;
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

        .table-container {
            width: 100%;
            margin-bottom: 1cm;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 0.2cm;
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
            font-size: 8px;
            margin-top: 0.1cm;
            margin-bottom: 0.1cm;
        }

        /* Use CSS Grid to achieve the layout */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 0.2cm;
            width: 21cm; /* A4 paper width */
            height: 21cm; /* Allow content to flow naturally */
        }

        .grid-item {
            text-align: center;
        }

        /* Adjust table font size to fit within A4 page */
        .container table {
            font-size: 8px;
        }

    </style>
</head>
<body>
    <div class="company-details">
        <h2>{{$po->company}}</h2>
        <p>{{$po->company_address}}</p>
        <div class="line"></div>
    </div>

    <h2 style="text-align: center;">PURCHASE ORDER</h2>

    <div class="container">
        <div class="grid-container">
            <div class="grid-item">
                <div class="section">
                    <h5>{{$po->company}}</h5>
                    <p>{{$po->company_address}}</p>
                </div>
            </div>
            <div class="grid-item">
                <div class="section">
                    <p><span class="bold-text">Date:</span> <span class="regular-text">{{$po->po_date}}</span></p>
                    <p><span class="bold-text">Purchased Order No:</span> <span class="regular-text">{{$po->po_no}}</span></p>
                </div>
            </div>
            <div class="grid-item">
                <div class="section">
                    <h5>Vendor Name</h5>
                    <p><strong>{{$po->vendor_name}}</strong></p>
                    <p>{{$po->vendor_address}}</p>
                </div>
            </div>
            <div class="grid-item">
                <div class="section">
                    <h5>Shipping Address</h5>
                    <p><strong>{{$po->buyer_name}}</strong></p>
                    <p>{{$po->shipping_address}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="table-container">
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

    <div class="table-container">
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
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: right; font-weight: bold;">Sub Total</td>
                    <td style="text-align: right; font-weight: bold;">${{$po->total_purchase_price_no}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: right; font-weight: bold;">Freight</td>
                    <td style="text-align: right; font-weight: bold;">$0</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: right; font-weight: bold;">Tax</td>
                    <td style="text-align: right; font-weight: bold;">$0</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: right; font-weight: bold;">Miscellaneous</td>
                    <td style="text-align: right; font-weight: bold;">$0</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: right; font-weight: bold;">Total</td>
                    <td style="text-align: right; font-weight: bold;">${{$po->total_purchase_price_no}}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="container">
        <hr>
        <div class="grid-container">
            <div class="grid-item">
                <p><span class="bold-text">Authorised By:</span></p>
            </div>
            <div class="grid-item">
                <p> <span class="bold-text">Date:</span></p>
            </div>
        </div>

        <div class="line"></div>
        <p class="small-text" style="text-align: center;">For more info on this purchase order, feel free to contact: missionsupport.procurement@protonmail.com</p>
    </div>
</body>
</html>
