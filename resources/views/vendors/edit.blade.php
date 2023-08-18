<x-master>
    <x-slot:title>
        {{$vendors->name}}
    </x-slot:title>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header bg-transparent">
                    <div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h2>{{$vendors->name}} Edit </h2>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <a href="{{ route('vendors.index') }}" class="btn btn-md btn-outline-secondary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('vendors.update',$vendors->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('update')

                        <div class="col-md-12 mb-3">
                            <label>Name</label>
                            <input type="text" name="slug" class="form-control" />
                            @error('slug') <small class="text-danger">{($message)}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Address</label>
                            <textarea name="vendor_address" id="vendor_address" class="form-control" rows="2" required></textarea>
                            @error('vendor_address') <small class="text-danger">{($message)}</small> @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <button type="submit" class="btn btn-md btn-outline-primary px-3 mx-2">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</x-master>