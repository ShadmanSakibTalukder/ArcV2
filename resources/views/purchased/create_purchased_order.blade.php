<x-master>
    <x-slot:title>
        Purchased Order
    </x-slot:title>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2> Create Purchased Order
                        <a href="{{ Route('purchased_order.index') }}" class="btn btn-primary btn-sm text-white float-end"> Back </a>
                    </h2>
                </div>
                <div class="card-body">
                    <form action="{{ ('')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Purchase Order ID</label>
                                <input type="text" name="name" class="form-control" />
                                @error('name') <small class="text-danger">{($message)}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Tender No.</label>
                                <input type="text" name="slug" class="form-control" />
                                @error('slug') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Work Order No.</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Items</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Purchase Price From</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Quantity</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Total Price</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Sub Total</label>
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
                                <button type="submit" class="btn btn-primary float-end">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</x-master>
