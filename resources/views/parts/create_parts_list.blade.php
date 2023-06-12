<x-master>
    <x-slot:title>
        Create Parts List
    </x-slot:title>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2> Create Parts List
                        <a href="{{ Route('parts_list.index') }}" class="btn btn-sm btn-outline-secondary float-end"> Back </a>
                    </h2>
                </div>
                <div class="card-body">
                    <form action="{{route('parts_list.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" />
                                @error('image ') <small class="text-danger">{($message)}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Requested Parts No.</label>
                                <input type="text" name="requested_part_no" class="form-control" />
                                @error('requested_part_no') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Requested Nomenclature</label>
                                <input type="text" name="requested_nomenclature" class="form-control" />
                                @error('requested_nomenclature') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Cat Parts No.</label>
                                <input type="text" name="cat_part_no" class="form-control" />
                                @error('cat_part_no') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Cat Nomenclature</label>
                                <input type="text" name="cat_nomenclature" class="form-control" />
                                @error('cat_nomenclature') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>NSN</label>
                                <input type="text" name="nsn" class="form-control" />
                                @error('nsn') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Classification</label>
                                <input type="text" name="classification" class="form-control" />
                                @error('classification') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Lead Time</label>
                                <input type="text" name="lead_time" class="form-control" />
                                @error('lead_time') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Weight</label>
                                <input type="text" name="weight" class="form-control" />
                                @error('weight') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Surplus Price</label>
                                <input type="text" name="surplus_price" class="form-control" />
                                @error('surplus_price') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>FS Price</label>
                                <input type="text" name="fs_price" class="form-control" />
                                @error('fs_price') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Navister Price</label>
                                <input type="text" name="navister_price" class="form-control" />
                                @error('navister_price') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Declared Price</label>
                                <input type="text" name="declared_price" class="form-control" />
                                @error('declared_price') <small class="text-danger">{($message)}</small> @enderror
                            </div>

                            <div class="my-5 d-flex justify-content-end p-3">
                                <button type="submit" class="btn btn-md btn-outline-primary px-3 mx-2">{{__('Save')}}</button>
                                <a href="{{route('parts_list.index')}}" class="btn btn-md btn-outline-secondary px-3 mx-2">{{__('Close')}}</a>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</x-master>