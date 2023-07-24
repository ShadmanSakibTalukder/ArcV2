<x-master>
    <x-slot:title>
        Tender
    </x-slot:title>

    <div class="card-header">
        <h2> Tender
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{route('tenders.index')}}" class="btn btn-primary btn-sm text-white me-2">Tender List</a>
            </div>
        </h2>
    </div>
    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2>Dhaka Cantonment(CMTD)</h2>
                <p>Invitation Of Tender</p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p><strong>Tender No:</strong> {{$tender->tender_no}}</p>
                <p><strong>Date:</strong> {{$tender->issue_date}}</p>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">sl</th>
                    <th scope="col">Part No</th>
                    <th scope="col">Nomenclature</th>
                    <th scope="col">Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tender->tenderItems as $item)
                @php
                $catPart = App\Models\CatelogPartList::where('part_no', $item->part_no)->first();
                @endphp
                <tr class="{{ $catPart ? 'table-success' : 'table-danger' }}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->part_no}}</td>
                    <td>{{$item->nomenclature}}</td>
                    <td>{{$item->qty}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-master>