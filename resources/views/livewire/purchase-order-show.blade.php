<div>
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
                                <th>Price</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Part 1</td>
                                <td>1234</td>
                                <td>Nomenclature 1</td>
                                <td>10</td>
                                <td>
                                    <select class="form-select sm">
                                        <option value="fsPrice">FS Price</option>
                                        <option value="surplusPrice">Surplus Price</option>
                                        <option value="navisterPrice">Navister Price</option>
                                    </select>
                                </td>
                                <td>$10</td>
                                <td>$100</td>
                            </tr>
                            <tr>
                                <td>Part 2</td>
                                <td>5678</td>
                                <td>Nomenclature 2</td>
                                <td>5</td>
                                <td>
                                    <select class="form-select">
                                        <option value="fsPrice">FS Price</option>
                                        <option value="surplusPrice">Surplus Price</option>
                                        <option value="navisterPrice">Navister Price</option>
                                    </select>
                                </td>
                                <td>$15</td>
                                <td>$75</td>
                            </tr>
                            <tr>
                                <td>Part 3</td>
                                <td>9012</td>
                                <td>Nomenclature 3</td>
                                <td>2</td>
                                <td>
                                    <select class="form-select">
                                        <option value="fsPrice">FS Price</option>
                                        <option value="surplusPrice">Surplus Price</option>
                                        <option value="navisterPrice">Navister Price</option>
                                    </select>
                                </td>
                                <td>$20</td>
                                <td>$40</td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <h6>Total Price:</h6>
                                </td>
                                <td colspan="1">
                                    <h4>4000</h4>
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
                            @forelse ($parts as $item)
                            <tr>
                                <td>{{$item->requested_part_no}}</td>
                                <td>{{$item->requested_nomenclature}}</td>
                                <td><button type="button" class="btn btn-sm btn-outline-secondary btn-add"><i class="fa-solid fa-plus fa-bounce"></i></button></td>
                            </tr>
                            @empty
                            <td colspan="3">No parts Available</td>
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>
</div>