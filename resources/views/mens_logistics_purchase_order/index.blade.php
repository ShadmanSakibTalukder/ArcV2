<x-master>
    <x-slot:title>
        Mens Logistics Purchase Order List
    </x-slot:title>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-header bg-transparent">
                        <h2>Purchased Order
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="{{ route('m_purchase_order.create') }}" class="btn btn-md btn-outline-secondary">Create Purchased Order</a>
                            </div>
                        </h2>
                    </div>
                    <div class="card-body">

                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">PO No.</th>
                                    <th scope="col">Tender No.</th>
                                    <th scope="col">Work Order No.</th>
                                    <th scope="col">Total Purchase Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>No Purchase Order Available</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-master>