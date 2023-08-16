<x-master>
    <x-slot:title>
        ARC Trading
    </x-slot:title>

    <style>
        .card-header {
            background-color: lavender;
            color: black;
        }

        .card-body {
            background-color: white;
            color: black;
        }

        table {
            background-color: azure;
            color: black;
        }

        table.table {
            border-color: #ccc;
        }

        table.table th {
            border-color: #ccc;
            background-color: #B0C4DE;
        }

        table.table td {
            border-color: #ccc;
            background-color: white;
        }
    </style>
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

    </div>
    <br><br>
    <h2>Tender Under Process</h2>
    <div class="line"></div>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Date</th>
                <th scope="col">Tender No</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>2023-07-17</td>
                <td>TN001</td>
                <td>
                    <a href="{{('#')}}" class="btn btn-sm link-success"><i class="fa-solid fa-download"></i></a>
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
                    <a href="{{('#')}}" class="btn btn-sm link-success"><i class="fa-solid fa-download"></i></a>
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



    <div class="col-md-12">
        <h2>Purchase Order In Process</h2>
        <div class="line"></div>
        <br>
        <div class="table-responsive d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
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
                            <a href="{{('#')}}" class="btn btn-sm link-success"><i class="fa-solid fa-download"></i></a>
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
                            <a href="{{('#')}}" class="btn btn-sm link-success"><i class="fa-solid fa-download"></i></a>
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
</x-master>