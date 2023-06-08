<x-master>
    <x-slot:title>
        Parts List
    </x-slot:title>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2> Parts List
                        <div class="d-flex justify-content-end align-items-center">
          <a href="{{Route('parts_list.create')}}" class="btn btn-primary btn-sm text-white me-2">Create Parts List</a>
        </div>
                 </h2>
                </div>
                <div class="card-body">
                    <form action="{{url('')}}" method="POST" enctype="multipart/form-data">
                    @csrf

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Serial</th>
            <th scope="col">Nomenclature</th>
            <th scope="col">Requested Part No.</th>
            <th scope="col">Catalog Part No.</th>
            <th scope="col">NSN</th>
            <th scope="col">FS New Surplus Stock</th>
            <th scope="col">FS New Surplus Price</th>
            <th scope="col">FS New Price</th>
            <th scope="col">Navister Price</th>
            <th scope="col">Previous Declared Price</th>
            <th scope="col">Certificate</th>
            <th scope="col">Lean Time</th>
            <th scope="col">Weight</th>
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
