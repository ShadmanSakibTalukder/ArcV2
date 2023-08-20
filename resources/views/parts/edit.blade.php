<x-master>
    <x-slot:title>
        Edit {{$parts_list->requested_nomenclature}}
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
                    <h2> Edit {{$parts_list->requested_nomenclature}}
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
                                <label>Declared Price</label>
                                <input type="text" name="declared_price" class="form-control" value="{{old('declared_price',$parts_list->declared_price)}}" />
                                @error('declared_price') <small class="text-danger">{($message)}</small> @enderror
                            </div>

                            <br>
                            <div class="form-group my-3">
                                <label for="vendor" class="form-label"><strong>{{__('Select Vendor')}}</strong></label>
                                <div class="row">
                                    @forelse($vendor as $item)
                                    <div class="col-md-2">
                                        <div class="p-2 border m-3">
                                            <input type="checkbox" name=" vendor[{{$item->id}}]" value="{{$item->id}}"><span> </span>{{$item->name}}
                                            <br>
                                            <input type="text" class="form-control" name="price[{{$item->id}}]" value="{{old('price')}}" placeholder="price">

                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-md-12">
                                        <h4>{{__('No Vendors Available')}}</h4>
                                    </div>

                                    @endforelse
                                </div>

                            </div>

                            <div class="form-group my-3">
                                <label for="sizes" class="form-label"><strong>{{__('Available Prices')}}</strong></label>

                                <div class="row">
                                    @foreach ($parts_list->vendorPrice as $item)
                                    <div class="col-md-3 mb-5">
                                        <div class="p-2 border m-3 sizeStocks">
                                            @if ($item->vendorName)
                                            {{$item->vendorName->name}}
                                            @else

                                            @endif
                                            <br>
                                            <input type="text" class="form-control mt-2 priceUpdate" id="price" value="{{old('price',$item->price)}}" placeholder="Price">

                                            <span><button type="button" value="{{$item->id}}" class="updatePartPriceBtn btn btn-primary btn sm text-white m-1" comment="Update Price wise values"><i class="fa-regular fa-pen-to-square"></i></button></span>
                                            <button type="button" value="{{$item->id}}" class="deletePartPriceBtn btn btn-danger btn sm text-white m-1" comment="Delete Price"><i class="fa-regular fa-trash-can"></i></button>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
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

    @push('js')

    <script>
        $(document).on('click', '.updatePartPriceBtn', function() {
            var price_id = $(this).val();
            var part_id = "{{$parts_list->id}}";
            var price = $(this).closest('.sizeStocks').find('.priceUpdate').val();


            var data = {
                'part_id': part_id,
                'price': price
            }
            // alert(data);
            // console.log(data);

            $.ajax({
                type: "POST",
                url: "/admin/vendor_price/" + price_id,
                data: data,
                success: function(response) {
                    alert(response.message)
                }
            });
        });
        $(document).on('click', '.deletePartPriceBtn', function() {
            var price_id = $(this).val();
            var part_id = "{{$parts_list->id}}";
            var ths = $(this);

            $.ajax({
                type: "GET",
                url: "/admin/vendor_price/delete/" + price_id,
                success: function(response) {
                    ths.closest('.sizeStocks').remove();
                    alert(response.message)
                }
            });
        });
    </script>



    @endpush


</x-master>