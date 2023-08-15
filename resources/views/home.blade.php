<x-master>
    <x-slot:title>
        ARC Trading
    </x-slot:title>

    <style>
        .card-header {
            background-color: lavender;
            color: black;
        }

        .card-body {
            background-color: white;
            color: black;
        }

        table {
            background-color: azure;
            color: black;
        }

        table.table {
            border-color: #ccc;
        }

        table.table th {
            border-color: #ccc;
            background-color: #B0C4DE;
        }

        table.table td {
            border-color: #ccc;
            background-color: white;
        }
    </style>
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

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>

    </div>

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">Total Tender</div>
                    <div class="card-body text-center fs-2"><strong>{{$tenderReceivedCount}}</strong></div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">Tender Completed</div>

                    <div class="card-body text-center fs-2"><strong>{{$tenderDoneCount}}</strong></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">Tender Under Process</div>
                    <div class="card-body text-center fs-2"><strong>{{$tenderWorkingCount}}</strong></div>

                </div>
            </div>

        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">Total Purchase Order Created</div>
                    <div class="card-body text-center fs-2"><strong>{{$totalPOCount}}</strong></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">Purchase Order Done</div>
                    <div class="card-body text-center fs-2"><strong>{{$donePOCount}}</strong></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">Purchase Order Under Process</div>
                    <div class="card-body text-center fs-2"><strong>{{$workingPOCount}}</strong></div>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">Total Purchase Price for Prcessing POs</div>
                    <div class="card-body text-center fs-2"><strong>&#36; {{$processingPurchasePrice}}</strong></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">Total Declared Price for Processing POs</div>
                    <div class="card-body text-center fs-2"><strong>&#36; {{$processingDeclaredPrice}}</strong></div>
                </div>
            </div>
        </div>

    </div>
    <br><br>
    <h2>Tender Under Process</h2>
    <div class="line"></div>
    <br>
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Tender No.</th>
                <th scope="col">Date</th>
                <th scope="col">Ordered By</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tender as $item)
            @if ($item->status=='0')
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->tender_no }}</td>
                <td>{{ $item->issue_date }}</td>
                <td>{{ $item->orderd_by }}</td>
                <td>@if($item->status==0)
                    <a href="{{route('tenders.active',$item->id)}}" class="btn btn-sm link-success">{{__('Working')}}</a>
                    @else
                    <a href="{{route('tenders.inactive',$item->id)}}" class="btn btn-sm link-danger">{{__('Done')}}</a>

                    @endif
                </td>
                <td>
                    <a href="{{ route('tenders.show', $item->id) }}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                    <form action="{{ route('tenders.destroy', $item->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fa-solid fa-trash fs-5"></i></button>
                    </form>
                </td>
            </tr>
            @else
            <td colspan="7">All Tenders Done</td>
            @endif
            @empty
            <tr>
                <td colspan="7"><Strong>No Tenders Available</Strong></td>
            </tr>
            @endforelse
        </tbody>
    </table>



    <div class="col-md-12 mb-5">
        <h2>Purchase Order In Process</h2>
        <div class="line"></div>
        <br>
        <div class="table-responsive d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">

            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">PO No.</th>
                        <th scope="col">Tender No.</th>
                        <th scope="col">Work Order No.</th>
                        <th scope="col">Total Purchase Price</th>
                        <th scope="col">Total Declared Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($purchaseOrder as $item)
                    @if ($item->status=='0')
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->po_no }}</td>
                        <td>{{ $item->tender_no }}</td>
                        <td>{{ $item->wo_no }}</td>
                        <td>{{ $item->total_purchase_price_no }}</td>
                        <td>{{ $item->total_declared_price_no }}</td>

                        <td>@if($item->status==0)
                            <a href="{{route('purchased_order.active',$item->id)}}" class="btn btn-sm link-success">{{__('Under Process')}}</a>
                            @else
                            <a href="{{route('purchased_order.inactive',$item->id)}}" class="btn btn-sm link-danger">{{__('Delivered')}}</a>

                            @endif
                        </td>
                        <td>
                            <a href="{{ route('purchased_order.pdf_download', $item->id) }}" class="btn btn-sm link-success"><i class="fa-solid fa-download"></i></a>
                            <a href="{{ route('purchased_order.show', $item->id) }}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                            <form action="{{ route('purchased_order.destroy', $item->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fa-solid fa-trash fs-5"></i></button>
                            </form>
                        </td>
                    </tr>
                    @else
                    <td></td>
                    @endif
                    @empty
                    <tr>
                        <td colspan="8">No Purchased Orders Available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-master>