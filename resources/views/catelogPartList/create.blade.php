<x-master>
    <x-slot:title>
        Catelog Part List
    </x-slot:title>
    <h4>Catelog Part List create</h4>
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
        <input type="file" name="pdf_file">
        <button type="submit">Upload</button>
    </form>
</x-master>