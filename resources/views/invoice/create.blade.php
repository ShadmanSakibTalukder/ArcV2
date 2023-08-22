<x-master>
    <x-slot:title>
        Create Invoice
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

    <div class="card-header bg-transparent">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2>Create Invoice</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('invoices.index') }}" class="btn btn-md btn-outline-danger">Back</a>
            </div>
        </div>
    </div>
    <livewire:invoice.create-invoice />
</x-master>