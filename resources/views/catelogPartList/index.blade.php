<x-master>
    <x-slot:title>
        Category Parts List
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4 class="h2">{{__('Parts List')}}</h4>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <a type="button" href="{{route('catelog_part_list.create')}}" class="btn btn-sm btn-outline-secondary">
                            <span><i class="fa-solid fa-plus"></i></span>{{__(' Create')}}
                        </a>
                        <a type="button" href="{{route('book_show')}}" class="btn btn-sm btn-outline-secondary">
                            {{__(' Show Catalog')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">sl</th>
                                <th scope="col">Item No</th>
                                <th scope="col">Part No</th>
                                <th scope="col">CAGEC</th>
                                <th scope="col">NSN</th>
                                <th scope="col">Description</th>
                                <th scope="col">Page No</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cat_parts as $item)
                            <tr @if($item->has_missing_data) class="table-danger" @endif>
                                <td>{{$item->id}}</td>
                                <td>{{$item->item_no}}</td>
                                <td @if(empty($item->part_no)) class="table-danger" @endif>{{$item->part_no}}</td>
                                <td @if(empty($item->nsn)) class="table-danger" @endif>{{$item->cagec}}</td>
                                <td @if(empty($item->nsn)) class="table-danger" @endif>{{$item->nsn}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->page_no}}</td>
                                <td>
                                    <a href="{{route('catelog_part_list.edit',$item->id)}}" class=" btn btn-sm link-warning" comment="Edit Part"><i class="fa-solid fa-pen-to-square fs-5"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
                                    <h4>No Part Available</h4>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>
                    {{$cat_parts->links()}}
                </div>
            </div>
        </div>
    </div>
</x-master>