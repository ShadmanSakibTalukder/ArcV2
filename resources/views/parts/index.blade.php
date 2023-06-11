<x-master>
    <x-slot:title>
        Parts List
    </x-slot:title>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4 class="h2">{{__('Parts List')}}</h4>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <a type="button" href="{{route('parts_list.create')}}" class="btn btn-sm btn-outline-secondary">
                            <span><i class="fa-solid fa-plus"></i></span>{{__(' Create')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <!-- Table content -->
 <thead>
            <tr>
                <th scope="col">sl</th>
                <th scope="col">image</th>
                <th scope="col">Parts No.</th>
                <th scope="col">NSN</th>
                <th scope="col">Nomenclature</th>
                <th scope="col">Purchase Price</th>
                <th scope="col">Declared Price</th>
                <th scope="col">Classification</th>
                <th scope="col">Lead Time</th>
                <th scope="col">Weight</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($parts as $item)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                @if($item->image)
                <td class="tableImage"><img style="width: 150px; height: 100px;" src="{{asset('storage/parts/'.$item->image)}}" alt="image"></td>
                @else
                <td class="text-danger">Image Missing</td>
                @endif
                <td>
                    <table class="table table-bordered align-middle">
                        <tbody>
                            <tr>
                                <td>Requested part no</td>
                                <td>{{$item->requested_part_no}}</td>
                            </tr>
                            <tr>
                                <td>Cat part no</td>
                                @if ($item->cat_part_no)
                                <td>{{$item->cat_part_no}}</td>
                                @else
                                <td class="text-danger">Not Available!</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </td>
                @if ($item->nsn)
                <td>{{$item->nsn}}</td>
                @else
                <td class="text-danger">Not Available!</td>
                @endif
                <td>
                    <table class="table table-bordered align-middle">
                        <tbody>
                            <tr>
                                <td>Requested Nomenclature</td>
                                <td>{{$item->requested_nomenclature}}</td>
                            </tr>
                            <tr>
                                <td>Cat Nomenclature</td>
                                @if ($item->cat_nomenclature)
                                <td>{{$item->cat_nomenclature}}</td>
                                @else
                                <td class="text-danger">Not Available!</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <table class="table table-bordered align-middle">
                        <tbody>
                            <tr>
                                <td>Surplus Price</td>
                                @if ($item->surplus_price)
                                <td>{{$item->surplus_price}}</td>
                                @else
                                <td class="text-danger">Not Available!</td>
                                @endif
                            </tr>
                            <tr>
                                <td>FS Price</td>
                                @if ($item->fs_price)
                                <td>{{$item->fs_price}}</td>
                                @else
                                <td class="text-danger">Not Available!</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Navister Price</td>
                                @if ($item->navister_price)
                                <td>{{$item->navister_price}}</td>
                                @else
                                <td class="text-danger">Not Available!</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </td>
                @if ($item->declared_price)
                <td>{{$item->declared_price}}</td>
                @else
                <td class="text-danger">Not Available!</td>
                @endif
                @if ($item->classification)
                <td>{{$item->classification}}</td>
                @else
                <td class="text-danger">Not Available!</td>
                @endif
                @if ($item->lead_time)
                <td>{{$item->lead_time}}</td>
                @else
                <td class="text-danger">Not Available!</td>
                @endif
                @if ($item->weight)
                <td>{{$item->weight}}</td>
                @else
                <td class="text-danger">Not Available!</td>
                @endif

                <td>


                    <a href="#" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                    <a href="#" class=" btn btn-sm link-warning" comment="Edit Product"><i class="fa-solid fa-pen-to-square fs-5"></i></a>
                    <form action="#" method="post" style="display:inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure want to delete')"><i class="fa-solid fa-trash fs-5"></i></button>
                    </form>


                </td>




            </tr>
            @empty
            <div class="p-3 py-md-5 bg-light">
                <h4>{{__('No Product Available')}}</h4>
            </div>

            @endforelse
        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-master>
