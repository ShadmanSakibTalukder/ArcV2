<x-master>
    <x-slot:title>
        Vendors
    </x-slot:title>
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
                    <form action="{{ ('')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Vendor ID</label>
                                <input type="text" name="name" class="form-control" />
                                @error('name') <small class="text-danger">{($message)}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" name="slug" class="form-control" />
                                @error('slug') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Address</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Contact</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label> <br/>
                            <input type="checkbox" name="status" />
                            @error('status') <small class="text-danger">{($message)}</small> @enderror
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
