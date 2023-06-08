<x-master>
    <x-slot:title>
        Purchased Order
    </x-slot:title>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2> Purchased Order
                        <div class="d-flex justify-content-end align-items-center">
          <a href="{{route('purchased_order.create')}}" class="btn btn-primary btn-sm text-white me-2">Create Purchased Order</a>
        </div>
                 </h2>
                </div>
                <div class="card-body">
                    <form action="{{url('')}}" method="POST" enctype="multipart/form-data">
                    @csrf

    <table class="table">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Tender No.</th>
            <th scope="col">Work Order No.</th>
            <th scope="col">Items</th>
            <th scope="col">Purchase Price From</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
            <th scope="col">Sub Total</th>
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
