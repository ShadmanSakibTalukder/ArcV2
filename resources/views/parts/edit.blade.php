<x-master>
    <x-slot:title>
        Create Parts List
    </x-slot:title>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header bg-transparent">
                    <h2> Edit Parts
                        <a href="{{ Route('parts_list.index') }}" class="btn btn-sm btn-outline-secondary float-end"> Back </a>
                    </h2>
                </div>
                <div class="card-body">
                    <form action="{{route('parts_list.update',$parts_list->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" />
                                <img src="{{ asset('storage/parts/' . $parts_list->image) }}" alt="" class=" border border-blue-600" width="100px" height="100px">
                                @error('image ') <small class="text-danger">{($message)}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Requested Parts No.</label>
                                <input type="text" name="requested_part_no" class="form-control" value="{{old('requested_part_no',$parts_list->requested_part_no)}}" />
                                @error('requested_part_no') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Requested Nomenclature</label>
                                <input type="text" name="requested_nomenclature" class="form-control" value="{{old('requested_nomenclature',$parts_list->requested_nomenclature)}}" />
                                @error('requested_nomenclature') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Cat Parts No.</label>
                                <input type="text" name="cat_part_no" class="form-control" value="{{old('cat_part_no',$parts_list->cat_part_no)}}" />
                                @error('cat_part_no') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Cat Nomenclature</label>
                                <input type="text" name="cat_nomenclature" class="form-control" value="{{old('cat_nomenclature',$parts_list->cat_nomenclature)}}" />
                                @error('cat_nomenclature') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>NSN</label>
                                <input type="text" name="nsn" class="form-control" value="{{old('nsn',$parts_list->nsn)}}" />
                                @error('nsn') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Classification</label>
                                <input type="text" name="classification" class="form-control" value="{{old('classification',$parts_list->classification)}}" />
                                @error('classification') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Lead Time</label>
                                <input type="text" name="lead_time" class="form-control" value="{{old('lead_time',$parts_list->lead_time)}}" />
                                @error('lead_time') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Weight</label>
                                <input type="text" name="weight" class="form-control" value="{{old('weight',$parts_list->weight)}}" />
                                @error('weight') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Surplus Price</label>
                                <input type="text" name="surplus_price" class="form-control" value="{{old('surplus_price',$parts_list->surplus_price)}}" />
                                @error('surplus_price') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>FS Price</label>
                                <input type="text" name="fs_price" class="form-control" value="{{old('fs_price',$parts_list->fs_price)}}" />
                                @error('fs_price') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Navister Price</label>
                                <input type="text" name="navister_price" class="form-control" value="{{old('navister_price',$parts_list->navister_price)}}" />
                                @error('navister_price') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Declared Price</label>
                                <input type="text" name="declared_price" class="form-control" value="{{old('declared_price',$parts_list->declared_price)}}" />
                                @error('declared_price') <small class="text-danger">{($message)}</small> @enderror
                            </div>

                            <div class="my-5 d-flex justify-content-end p-3">
                                <button type="submit" class="btn btn-md btn-outline-primary px-3 mx-2">{{__('Update')}}</button>
                                <a href="{{route('parts_list.index')}}" class="btn btn-md btn-outline-secondary px-3 mx-2">{{__('Close')}}</a>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</x-master>