<x-master>
    <x-slot:title>
        Profit Loss
    </x-slot:title>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header bg-transparent">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h2>Profit Loss</h2>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <a href="{{ route('profit_loss.create') }}" class="btn btn-md btn-outline-secondary">Create Profit Loss Statement</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th scope="col">Sl.</th>
                    <th scope="col">Consolidate ID</th>
                    <th scope="col">PO Nos</th>
                    <th scope="col">Purchase Price</th>
                    <th scope="col">Declared Price</th>
                    <th scope="col">Paid</th>
                    <th scope="col">Due</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($consolidate as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        @foreach ($item->profitLossItems as $pitem)

                        {{$pitem->purchaseOrder->po_no}},
                        @endforeach
                    </td>
                    <td>{{$item->total_purchase_price}}</td>
                    <td>{{$item->total_declared_price}}</td>
                    <td>0</td>
                    <td>{{$item->total_declared_price}}</td>
                    <td>@if($item->status==0)
                        <a href="{{route('profit_loss.active',$item->id)}}" class="btn btn-sm link-success">{{__('Not Closed')}}</a>
                        @else
                        <a href="{{route('profit_loss.inactive',$item->id)}}" class="btn btn-sm link-danger">{{__('Full paid and closed')}}</a>

                        @endif
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm link-success"><i class="fa-solid fa-pen-to-square fs-5"></i></a>
                        <a href="#" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                        <form action="#" method="post" style="display:inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fa-solid fa-trash fs-5"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9"> No Consolidated report available!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-master>