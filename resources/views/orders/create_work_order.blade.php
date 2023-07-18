<x-master>
    <x-slot:title>
        Create Work order
    </x-slot:title>
  <div class="container">
        <h3>Create Work Order</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-section">
                    <div class="mb-3">
                        <label for="vendorName" class="form-label">Vendor Name:</label>
                        <input type="text" class="form-control" id="vendorName">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="address">
                    </div>
                    <div class="mb-3">
                        <label for="partsNo" class="form-label">Parts Number:</label>
                        <input type="string" class="form-control" id="partsNo">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date:</label>
                        <input type="date" class="form-control" id="date">
                    </div>
                    <div class="table responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Parts No.</th>
                                <th>NSN</th>
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
                                    <select class="form-select">
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
                        </tbody>
                    </table>
                    <div class="my-5 d-flex justify-content-end p-3">
                        <button type="button" class="btn btn-md btn-outline-primary px-3 mx-2">Save</button>
                        <a href="{{route('work_orders.index')}}" class="btn btn-md btn-outline-secondary px-3 mx-2">Back</a>
                    </div>

                </div>
            </div>
            </div>
            <div class="col-md-6">
                <div class="search-section">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search parts">
                        <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-search"></i></button>
                    </div>
                </div>
                <div class="listbox-section">
                    <div class="listbox">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Parts No.</th>
                                    <th>Nomenclature</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Part 4</td>
                                    <td>Nomenclature 4</td>
                                    <td><button type="button" class="btn btn-sm btn-outline-secondary btn-add">+</button></td>
                                </tr>
                                <tr>
                                    <td>Part 5</td>
                                    <td>Nomenclature 5</td>
                                    <td><button type="button" class="btn btn-sm btn-outline-secondary btn-add">+</button></td>
                                </tr>
                                <tr>
                                    <td>Part 6</td>
                                    <td>Nomenclature 6</td>
                                    <td><button type="button" class="btn btn-sm btn-outline-secondary btn-add">+</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-master>
