<x-master>
    <x-slot:title>
        Create Parts List
    </x-slot:title>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2> Create Parts List
                        <a href="{{ Route('parts_list.index') }}" class="btn btn-primary btn-sm text-white float-end"> Back </a>
                    </h2>
                </div>
                <div class="card-body">
                    <form action="{{('')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Parts ID</label>
                                <input type="text" name="slug" class="form-control" />
                                @error('slug') <small class="text-danger">{($message)}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Nomenclature</label>
                                <input type="text" name="name" class="form-control" />
                                @error('name') <small class="text-danger">{($message)}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Requested Part No.</label>
                                <input type="text" name="slug" class="form-control" />
                                @error('slug') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Catalog Part No.</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>NSN</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Flight Source New Surplus Stock</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Flight Source New Surplus Price</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Flight Source New Price</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Navister Price</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Previous Declared Price</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Certificate</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Lean Time</label>
                                <input type="date" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Weight</label>
                                <input type="text" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{($message)}</small> @enderror
                            </div>
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
