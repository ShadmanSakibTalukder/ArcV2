<x-master>
    <x-slot:title>
        Create Parts List
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
                                <input type="text" name="requested_part_no" id="requested_part_no" class="form-control" />
                                <small class="text-danger" id="requested_part_no_error"></small>
                                @error('requested_part_no') <small class="text-danger">{{ $message }}</small> @enderror
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
                                <label>Declared Price</label>
                                <input type="text" name="declared_price" class="form-control" />
                                @error('declared_price') <small class="text-danger">{($message)}</small> @enderror
                            </div>

                            <br>
                            <div class="form-group my-3">
                                <label for="vendor" class="form-label"><strong>{{__('Select Vendor')}}</strong></label>
                                <div class="row">
                                    @forelse($vendor as $item)
                                    <div class="col-md-2">
                                        <div class="p-2 border m-3">
                                            <input type="checkbox" id="vendor" name="vendor[{{$item->id}}]" value="{{$item->id}}"><span> </span>{{$item->name}}
                                            <br>
                                            <input type="text" class="form-control" id="price" name="price[{{$item->id}}]" value="{{old('price')}}" placeholder="price">

                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-md-12">
                                        <h4>{{__('No Vendors Available')}}</h4>
                                    </div>

                                    @endforelse
                                </div>

                            </div>

                            <!-- <div class="my-5 d-flex justify-content-end p-3">
                                <button type="submit" class="btn btn-md btn-outline-primary px-3 mx-2">{{__('Save')}}</button>
                                <a href="{{route('parts_list.index')}}" class="btn btn-md btn-outline-secondary px-3 mx-2">{{__('Close')}}</a>
                            </div> -->

                            <div class="my-5 d-flex justify-content-end p-3">
                                <button type="submit" id="saveButton" class="btn btn-md btn-outline-primary px-3 mx-2">{{ __('Save') }}</button>
                                <a href="{{ route('parts_list.index') }}" class="btn btn-md btn-outline-secondary px-3 mx-2">{{ __('Close') }}</a>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const requestedPartNoInput = document.getElementById('requested_part_no');
            const requestedPartNoError = document.getElementById('requested_part_no_error');
            const saveButton = document.getElementById('saveButton');

            const existingPartNos = <?php echo json_encode($existingPartNos); ?>;

            requestedPartNoInput.addEventListener('input', function() {
                const inputValue = requestedPartNoInput.value.trim();

                if (inputValue === '') {
                    requestedPartNoError.textContent = 'Requested Parts No. is required';
                    saveButton.disabled = true;
                } else {
                    requestedPartNoError.textContent = '';
                    saveButton.disabled = false;

                    if (existingPartNos.includes(inputValue)) {
                        requestedPartNoError.textContent = 'Requested Parts No. already exists';
                        saveButton.disabled = true;
                    }
                }
            });
        });
    </script>


    @endpush

</x-master>