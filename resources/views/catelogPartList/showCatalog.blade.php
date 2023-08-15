<x-master>
    <x-slot:title>
        Catalogue
    </x-slot:title>
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap align-items-center pb-2 border-bottom">
                <h4 class="h2">{{__('Catelogue')}}</h4>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a type="button" href="{{route('catelog_part_list.index')}}" class="btn btn-sm btn-outline-secondary">
                        {{__('Part List')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <iframe src="{{ asset('assets\pdf\MRAP_Part_list.pdf') }}" width="100%" height="750px"></iframe>

</x-master>