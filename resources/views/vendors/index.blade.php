<x-master>
    <x-slot:title>
        Vendors
    </x-slot:title>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header bg-transparent">
                    <h2>Vendors
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="{{ route('vendors.create') }}" class="btn btn-md btn-outline-secondary">Create Vendor</a>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($vendors as $item )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->vendor_address}}</td>
                                    <td>
                                        <form action="{{route('vendors.destroy',$item->id)}}" method="post" style="display:inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure want to delete')"><i class="fa-solid fa-trash fs-5"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">No vendors Available</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-master>