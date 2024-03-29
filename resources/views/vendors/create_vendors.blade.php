<x-master>
    <x-slot:title>
        Vendors
    </x-slot:title>

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
            <div class="card border-0">
                <div class="card-header bg-transparent">
                    <div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h2> Vendors </h2>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <a href="{{ route('vendors.index') }}" class="btn btn-md btn-outline-secondary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('vendors.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="col-md-12 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" />
                            @error('name') <small class="text-danger">{($message)}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Address</label>
                            <textarea name="vendor_address" id="vendor_address" class="form-control" rows="2" required></textarea>
                            @error('vendor_address') <small class="text-danger">{($message)}</small> @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <button type="submit" class="btn btn-md btn-outline-primary px-3 mx-2">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</x-master>