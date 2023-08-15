<x-support.master>
    <x-slot:title>
        Mens Logistics Purchase Order List
    </x-slot:title>
    <div>
        @if (session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session()->has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h2>Mens Logistics Purchase Order List</h2>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="{{ route('m_purchase_order.create') }}" class="btn btn-md btn-outline-secondary">Create Purchased Order</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
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
                            @forelse ($mensPurchaseOrder as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->po_no }}</td>
                                <td>{{ $item->tender_no }}</td>
                                <td>{{ $item->wo_no }}</td>
                                <td>{{ $item->total_declared_price_no }}</td>
                                <td>
                                    <a href="{{ route('m_purchase_order.show', $item->id) }}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                                    <form action="{{ route('m_purchase_order.destroy', $item->id) }}" method="post" style="display:inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fa-solid fa-trash fs-5"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>No Purchase Order Available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-support.master>