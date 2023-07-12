<x-master>
    <x-slot:title>
        Purchased Order
    </x-slot:title>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2> Purchased Order
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="{{route('purchased_order.create')}}" class="btn btn-primary btn-sm text-white me-2">Create Purchased Order</a>
                        </div>
                    </h2>
                </div>
                <div class="card-body">
                    <form action="{{url('')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">PO No.</th>
                                    <th scope="col">Tender No.</th>
                                    <th scope="col">Work Order No.</th>
                                    <th scope="col">Total Purchase Price</th>
                                    <th scope="col">Total Declared Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($purchaseOrders as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$item->po_no}}</td>
                                    <td>{{$item->tender_no}}</td>
                                    <td>{{$item->wo_no}}</td>
                                    <td>{{$item->total_purchase_price_no}}</td>
                                    <td>
                                        <a href="{{route('purchased_order.show',$item->id)}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                                    </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>





</x-master>