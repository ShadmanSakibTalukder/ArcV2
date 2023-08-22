<x-master>
    <x-slot:title>
        Invoices
    </x-slot:title>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header bg-transparent">
                    <h2>Invoices</h2>
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="{{ route('invoices.create') }}" class="btn btn-md btn-outline-secondary">Create Invoice</a>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Invoice No.</th>
                                <th scope="col">Tender No.</th>
                                <th scope="col">Work Order No.</th>
                                <th scope="col">Total Purchase Price</th>
                                <th scope="col">Total Declared Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($invoices as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->invoice_no }}</td>
                                <td>{{ $item->tender_no }}</td>
                                <td>{{ $item->wo_no }}</td>
                                <td>{{ $item->total_purchase_price_ }}</td>
                                <td>{{ $item->total_declared_price_ }}</td>

                                <td>@if($item->status==0)
                                    <a href="{{route('invoices.active',$item->id)}}" class="btn btn-sm link-success">{{__('Under Process')}}</a>
                                    @else
                                    <a href="{{route('invoices.inactive',$item->id)}}" class="btn btn-sm link-danger">{{__('Delivered')}}</a>

                                    @endif
                                </td>
                                <td>
                                    <a href="{{ ('') }}" class="btn btn-sm link-success"><i class="fa-solid fa-download"></i></a>
                                    <a href="{{ ('') }}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                                    <form action="{{ route('invoices.destroy', $item->id) }}" method="post" style="display:inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fa-solid fa-trash fs-5"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No Invoice Available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {!! $invoices->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-master>