<x-master>
    <x-slot:title>
        Work Orders
    </x-slot:title>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                         <h2> Work Orders </h2>
                         <div class="btn-toolbar mb-2 mb-md-0">
          <a href="{{ route('work_orders.create') }}" class="btn btn-md btn-outline-secondary">Create Work Order</a>
        </div>
    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('')}}" method="POST" enctype="multipart/form-data">
                    @csrf

    <table class="table">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Work Order No.</th>
            <th scope="col">Tender No.</th>
            <th scope="col">Date</th>
            <th scope="col">Items</th>
            <th scope="col">Ordered By</th>
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
    </div>
</div>
</div>
</div>



</x-master>
