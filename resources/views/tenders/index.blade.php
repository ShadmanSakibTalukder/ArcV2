<x-master>
    <x-slot:title>
        Tender
    </x-slot:title>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header bg-transparent">
                    <h2>Tender
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="{{ route('tenders.create') }}" class="btn btn-sm btn-outline-secondary float-end">Create Tender</a>
                        </div>
                    </h2>
                </div>
                <div class="card-body">
                    <form action="{{ url('') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered align-middle">
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
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->tender_no }}</td>
                                    <td>{{ $item->issue_date }}</td>
                                    <td>{{ $item->orderd_by }}</td>
                                    <td>
                                        <a href="{{ route('tenders.show', $item->id) }}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                                        <form action="{{ route('tenders.destroy', $item->id) }}" method="post" style="display:inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fa-solid fa-trash fs-5"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">No Tenders Available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $tenderList->links() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-master>
