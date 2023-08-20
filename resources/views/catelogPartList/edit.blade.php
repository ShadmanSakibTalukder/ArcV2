<x-master>
    <x-slot:title>
        Edit {{$catelogPartList->description}}
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
                    <h2> Edit {{$catelogPartList->description}}
                        <a href="{{ Route('catelog_part_list.index') }}" class="btn btn-sm btn-outline-secondary float-end"> Back </a>
                    </h2>
                </div>
                <div class="card-body">
                    <form action="{{route('catelog_part_list.update',$catelogPartList->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label>Item No</label>
                                <input type="text" name="item_no" class="form-control" value="{{old('item_no',$catelogPartList->item_no)}}" />
                                @error('item_no') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Part No</label>
                                <input type="text" name="part_no" class="form-control" value="{{old('part_no',$catelogPartList->part_no)}}" />
                                @error('part_no') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>NSN</label>
                                <input type="text" name="nsn" class="form-control" value="{{old('nsn',$catelogPartList->nsn)}}" />
                                @error('nsn') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>CAGEC</label>
                                <input type="text" name="cagec" class="form-control" value="{{old('cagec',$catelogPartList->cagec)}}" />
                                @error('cagec') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Page No</label>
                                <input type="text" name="page_no" class="form-control" value="{{old('page_no',$catelogPartList->page_no)}}" />
                                @error('page_no') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" value="{{old('description',$catelogPartList->description)}}" />
                                @error('description') <small class="text-danger">{($message)}</small> @enderror
                            </div>
                        </div>

                        <div class="my-5 d-flex justify-content-end p-3">
                            <button type="submit" class="btn btn-md btn-outline-primary px-3 mx-2">{{__('Update')}}</button>
                            <a href="{{route('catelog_part_list.index')}}" class="btn btn-md btn-outline-secondary px-3 mx-2">{{__('Close')}}</a>
                        </div>

                    </form>




                </div>
            </div>
        </div>
    </div>

</x-master>