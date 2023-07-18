<x-master>
    <x-slot:title>
        Catelog Part List
    </x-slot:title>
    <h4>Catelog Part List Create</h4>
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

    <form action="{{ route('catelog_part_list.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="pdf" class="form-label">Select PDF File</label>
            <input type="file" class="form-control" id="pdf" name="pdf">
        </div>
        <button type="submit" class="btn btn-primary">Load PDF</button>
    </form>
</x-master>
