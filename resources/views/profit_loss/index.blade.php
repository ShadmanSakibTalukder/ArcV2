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
    <div class="card-body">
        <form action="{{url('')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th scope="col">Sl.</th>
                        <th scope="col">Date</th>
                        <th scope="col">Purchase Price</th>
                        <th scope="col">Declared Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
<tbody>
<tr>
  <th scope="row">1</th>
  <td>Mark</td>
  <td>Otto</td>
  <td>@mdo</td>
</tr>
<tr>
  <th scope="row">2</th>
  <td>Jacob</td>
  <td>Thornton</td>
  <td>@fat</td>
</tr>
<tr>
  <th scope="row">3</th>
  <td colspan="2">Larry the Bird</td>
  <td>@twitter</td>
</tr>
</tbody>
</table>
</form>
</div>
</x-master>