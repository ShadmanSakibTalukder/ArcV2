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

                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th scope="col">sl</th>
                            <th scope="col">image</th>
                            <th scope="col">Part No.</th>
                            <th scope="col">NSN</th>
                            <th scope="col">Nomenclature</th>
                            <th scope="col">Purchase Price</th>
                            <th scope="col">Declared Price</th>
                            <th scope="col">Classification</th>
                            <th scope="col">Lead Time</th>
                            <th scope="col">Weight</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Not available</td>
                            <td>
                                <table class="table table-bordered align-middle">
                                    <tbody>
                                        <tr>
                                            <td>Requested part no</td>
                                            <td>given in tender</td>
                                        </tr>
                                        <tr>
                                            <td>Cat part no</td>
                                            <td>found in cat</td>
                                        </tr>

                                    </tbody>
                                </table>


                            </td>
                            <td>nsn number can be nullable</td>

                            <td>
                                <table class="table table-bordered align-middle">
                                    <tbody>
                                        <tr>
                                            <td>Requested nomenclature</td>
                                            <td>Specified in tender</td>
                                        </tr>
                                        <tr>
                                            <td>Cat nomenclature</td>
                                            <td>Found in Cat</td>
                                        </tr>

                                    </tbody>
                                </table>


                            </td>


                            <td>
                                <table class="table table-bordered align-middle">
                                    <tbody>
                                        <tr>
                                            <td>surplus price</td>
                                            <td>Low price</td>
                                        </tr>
                                        <tr>
                                            <td>FS price</td>
                                            <td>New Price from Steve</td>
                                        </tr>
                                        <tr>
                                            <td>Navister price</td>
                                            <td>New Price from navister</td>
                                        </tr>

                                    </tbody>
                                </table>

                            <td>Declared Price</td>
                            <td>Classification</td>
                            <td>Minimum delivery time</td>
                            <td>Part weight</td>
                            <td>


                                <a href="#" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                                <a href="#" class=" btn btn-sm link-warning" comment="Edit Product"><i class="fa-solid fa-pen-to-square fs-5"></i></a>
                                <form action="#" method="post" style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure want to delete')"><i class="fa-solid fa-trash fs-5"></i></button>
                                </form>


                            </td>

                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Not available</td>
                            <td>
                                <table class="table table-bordered align-middle">
                                    <tbody>
                                        <tr>
                                            <td>Requested part no</td>
                                            <td>12345</td>
                                        </tr>
                                        <tr>
                                            <td>Cat part no</td>
                                            <td>23456</td>
                                        </tr>

                                    </tbody>
                                </table>


                            </td>
                            <td>nsn number can be nullable</td>

                            <td>
                                <table class="table table-bordered align-middle">
                                    <tbody>
                                        <tr>
                                            <td>Requested nomenclature</td>
                                            <td>static test 1</td>
                                        </tr>
                                        <tr>
                                            <td>Cat nomenclature</td>
                                            <td>static test </td>
                                        </tr>

                                    </tbody>
                                </table>


                            </td>


                            <td>
                                <table class="table table-bordered align-middle">
                                    <tbody>
                                        <tr>
                                            <td>surplus price</td>
                                            <td>32.23</td>
                                        </tr>
                                        <tr>
                                            <td>FS price</td>
                                            <td>108.18</td>
                                        </tr>
                                        <tr>
                                            <td>Navister price</td>
                                            <td>23.23</td>
                                        </tr>

                                    </tbody>
                                </table>

                            <td>203.84</td>
                            <td>EAR99</td>
                            <td>123</td>
                            <td>230</td>
                            <td>


                                <a href="#" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                                <a href="#" class=" btn btn-sm link-warning" comment="Edit Product"><i class="fa-solid fa-pen-to-square fs-5"></i></a>
                                <form action="#" method="post" style="display:inline">
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
    </div>



</x-master>