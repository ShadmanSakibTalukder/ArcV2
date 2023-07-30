<x-master>
    <x-slot:title>
        Profit Loss
    </x-slot:title>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header bg-transparent">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h2>Profit Loss</h2>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <a href="{{ route('profit_loss.create') }}" class="btn btn-md btn-outline-secondary">Create Profit Loss Statement</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>