<x-master>
    <x-slot:title>
        ARC Trading
    </x-slot:title>

    <style>
        .card-header {
            background-color:mediumspringgreen;
            color: black;
        }

        .card-body {
            background-color: white;
            color: black;
        }

        table {
            background-color: mediumturquoise;
            color: black;
        }

       
        table.table {
            border-color: #ccc;
        }

        table.table th {
            border-color: #ccc;
            background-color: mediumturquoise;
        }

        table.table td {
            border-color: #ccc;
            background-color: white;
        }
    </style>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                <svg class="bi">
                    <use xlink:href="#calendar3" />
                </svg>
                This week
            </button>
        </div>
    </div>

<div class="container">
  <div class="row mb-4">
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">Total Tender</div>
        <div class="card-body">Dummy Value 1</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">Tender Completed</div>
        <div class="card-body">Dummy Value 2</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">Tender Under Process</div>
        <div class="card-body">Dummy Value 3</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">Tender Waiting</div>
        <div class="card-body">Dummy Value 4</div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">Total Purchase</div>
        <div class="card-body">Dummy Value 5</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">Purchase Account</div>
        <div class="card-body">Dummy Value 6</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">Total Declared</div>
        <div class="card-body">Dummy Value 7</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">Payment Account</div>
        <div class="card-body">Dummy Value 8</div>
      </div>
    </div>
  </div>

  <h2>Tender Under Process</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>SL</th>
          <th>Date</th>
          <th>Tender No</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>2023-07-17</td>
          <td>TN001</td>
          <td>
            <a href="{{('#')}}" class="btn btn-sm link-success"><i class="fa-solid fa-download"></i></i></a>
            <a href="{{('#')}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
            <form action="{{('#')}}" method="post" style="display:inline">
                @csrf
                @method('delete')
                <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure want to delete')"><i class="fa-solid fa-trash fs-5"></i></button>
            </form>
        </td>
        </tr>
        <tr>
          <td>2</td>
          <td>2023-07-18</td>
          <td>TN002</td>
          <td>
            <a href="{{('#')}}" class="btn btn-sm link-success"><i class="fa-solid fa-download"></i></i></a>
            <a href="{{('#')}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
            <form action="{{('#')}}" method="post" style="display:inline">
                @csrf
                @method('delete')
                <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure want to delete')"><i class="fa-solid fa-trash fs-5"></i></button>
            </form>
        </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<h2>Tender Under Process</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>SL</th>
          <th>Date</th>
          <th>Purchase Order No</th>
          <th>Purchase Order Position</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>2023-07-17</td>
          <td>poiuyt567</td>
          <td>TN001</td>
          <td>
            <a href="{{('#')}}" class="btn btn-sm link-success"><i class="fa-solid fa-download"></i></i></a>
            <a href="{{('#')}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
            <form action="{{('#')}}" method="post" style="display:inline">
                @csrf
                @method('delete')
                <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure want to delete')"><i class="fa-solid fa-trash fs-5"></i></button>
            </form>
        </td>
        </tr>
        <tr>
          <td>2</td>
          <td>2023-07-18</td>
          <td>poiuyt567</td>
          <td>TN002</td>
          <td>
            <a href="{{('#')}}" class="btn btn-sm link-success"><i class="fa-solid fa-download"></i></i></a>
            <a href="{{('#')}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
            <form action="{{('#')}}" method="post" style="display:inline">
                @csrf
                @method('delete')
                <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure want to delete')"><i class="fa-solid fa-trash fs-5"></i></button>
            </form>
        </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

    {{-- <h2>Section title</h2>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Header</th>
                    <th scope="col">Header</th>
                    <th scope="col">Header</th>
                    <th scope="col">Header</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1,001</td>
                    <td>random</td>
                    <td>data</td>
                    <td>placeholder</td>
                    <td>text</td>
                </tr>
                <tr>
                    <td>1,002</td>
                    <td>placeholder</td>
                    <td>irrelevant</td>
                    <td>visual</td>
                    <td>layout</td>
                </tr>
                <tr>
                    <td>1,003</td>
                    <td>data</td>
                    <td>rich</td>
                    <td>dashboard</td>
                    <td>tabular</td>
                </tr>
                <tr>
                    <td>1,003</td>
                    <td>information</td>
                    <td>placeholder</td>
                    <td>illustrative</td>
                    <td>data</td>
                </tr>
                <tr>
                    <td>1,004</td>
                    <td>text</td>
                    <td>random</td>
                    <td>layout</td>
                    <td>dashboard</td>
                </tr>
                <tr>
                    <td>1,005</td>
                    <td>dashboard</td>
                    <td>irrelevant</td>
                    <td>text</td>
                    <td>placeholder</td>
                </tr>
                <tr>
                    <td>1,006</td>
                    <td>dashboard</td>
                    <td>illustrative</td>
                    <td>rich</td>
                    <td>data</td>
                </tr>
                <tr>
                    <td>1,007</td>
                    <td>placeholder</td>
                    <td>tabular</td>
                    <td>information</td>
                    <td>irrelevant</td>
                </tr>
                <tr>
                    <td>1,008</td>
                    <td>random</td>
                    <td>data</td>
                    <td>placeholder</td>
                    <td>text</td>
                </tr>
                <tr>
                    <td>1,009</td>
                    <td>placeholder</td>
                    <td>irrelevant</td>
                    <td>visual</td>
                    <td>layout</td>
                </tr>
                <tr>
                    <td>1,010</td>
                    <td>data</td>
                    <td>rich</td>
                    <td>dashboard</td>
                    <td>tabular</td>
                </tr>
                <tr>
                    <td>1,011</td>
                    <td>information</td>
                    <td>placeholder</td>
                    <td>illustrative</td>
                    <td>data</td>
                </tr>
                <tr>
                    <td>1,012</td>
                    <td>text</td>
                    <td>placeholder</td>
                    <td>layout</td>
                    <td>dashboard</td>
                </tr>
                <tr>
                    <td>1,013</td>
                    <td>dashboard</td>
                    <td>irrelevant</td>
                    <td>text</td>
                    <td>visual</td>
                </tr>
                <tr>
                    <td>1,014</td>
                    <td>dashboard</td>
                    <td>illustrative</td>
                    <td>rich</td>
                    <td>data</td>
                </tr>
                <tr>
                    <td>1,015</td>
                    <td>random</td>
                    <td>tabular</td>
                    <td>information</td>
                    <td>text</td>
                </tr>
            </tbody>
        </table>
    </div> --}}
</x-master>