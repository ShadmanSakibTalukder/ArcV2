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
    <div>
        <h4>{{$tender->tender_no}}</h4>
        <p>{{$tender->issue_date}}</p>

        <table class="table">
            <thead>
                <th scope="col">sl</th>
                <th scope="col">Part Number</th>
                <th scope="col">Nomenclature</th>
                <th scope="col">Qty</th>
            </thead>
            <tbody>
                @foreach ($tender->tenderItems as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->parts->requested_part_no}}</td>
                    <td>{{$item->parts->requested_nomenclature}}</td>
                    <td>{{$item->qty}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</x-master>