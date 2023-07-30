<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header bg-transparent">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h2>Profit Loss</h2>
                        <div class="btn-toolbar mb-2 mb-md-0 d-flex align-items-center">
                            <!-- Search option -->
                            <input type="text" class="form-control mr-2" placeholder="Search">

                            <!-- Add Tender button -->
                            <a href="{{ route('profit_loss.create') }}" class="btn btn-md btn-outline-secondary">Add Tender</a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-3" style="background-color: rgb(179, 179, 248); color: black; padding: 8px;">
                        <p>Total Tender: 06</p>
                        <p>Total PO: 07</p>
                        <p>Total Purchase Price: 20,000$</p>
                        <p>Total Declared: 18,000$</p>
                    </div>
                </div>
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
                        <th scope="col">Price Total</th>
                        <th scope="col">Declared Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>T001</td>
                        <td>PO001</td>
                        <td>P001</td>
                        <td>Part A</td>
                        <td>10</td>
                        <td>5000$</td>
                        <td>4500$</td>
                    </tr>
                    <tr>
                        <td>T002</td>
                        <td>PO002</td>
                        <td>P002</td>
                        <td>Part B</td>
                        <td>5</td>
                        <td>2000$</td>
                        <td>1800$</td>
                    </tr>
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
                <tr>
                    <td>T001</td>
                    <td>10</td>
                    <td>9</td>
                    <!-- Add Action button column -->
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
                <tr>
                    <td>T002</td>
                    <td>5</td>
                    <td>4</td>
                    <!-- Add Action button column -->
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
            </tbody>
        </table>
    </div>
</div>
