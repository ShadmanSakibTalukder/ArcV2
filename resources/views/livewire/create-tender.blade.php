<div>
    <h3>Create Tender</h3>
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
                            <tr>
                                <td colspan="6">No items added yet.</td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <h6>Total Price:</h6>
                                </td>
                                <td colspan="1">
                                    <h4>0</h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mb-3">
                    <label for="tender" class="form-label">Tender ID:</label>
                    <input type="text" class="form-control" id="#" name="#">
                </div>
                <div class="mb-3">
                    <label for="buyer_name" class="form-label">Tender No:</label>
                    <input type="text" class="form-control" id="buyer_name" name="buyer_name">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Items:</label>
                    <textarea name="items" id="items" class="form-control" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="ordered_by" class="form-label">Ordered By:</label>
                    <input type="text" class="form-control" id="ordered_by" name="ordered_by">
                </div>
                <div class="mb-3">
                    <label for="po_date" class="form-label">Order Date:</label>
                    <input type="date" class="form-control" id="po_date" name="po_date">
                </div>
            </div>
            <button type="button" class="btn btn-md btn-outline-primary py-3 mx-2 mb-5">Save</button>
        </div>
        <div class="col-md-6">
            <div class="search-section">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search parts">
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
                            <tr>
                                <td colspan="3">No parts Available</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
