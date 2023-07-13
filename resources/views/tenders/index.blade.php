<x-master>
    <x-slot:title>
        Tender
    </x-slot:title>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2> Tender
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="{{route('tenders.create')}}" class="btn btn-primary btn-sm text-white me-2">Create Tender</a>
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
                                    <th scope="col">Tender No.</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Ordered By</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tenderList as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->tender_no}}</td>
                                    <td>{{$item->issue_date}}</td>
                                    <td>{{$item->orderd_by}}</td>
                                    <td>delete</td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                        {{$tenderList->links()}}
                </div>
            </div>
        </div>
    </div>



</x-master>