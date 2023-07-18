<x-master>
  <x-slot:title>
      Buyers
  </x-slot:title>
  <div class="row">
      <div class="col-md-12">
          <div class="card border-0">
              <div class="card-header bg-transparent">
                  <h2>Buyers
                      <div class="d-flex justify-content-end align-items-center">
                          <a href="{{ route('buyers.create') }}" class="btn btn-sm btn-outline-secondary float-end">Create Buyer</a>
                      </div>
                  </h2>
              </div>
              <div class="card-body">
                  <form action="{{ url('') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <table class="table table-bordered align-middle">
                          <thead>
                              <tr>
                                  <th scope="col">No.</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Address</th>
                                  <th scope="col">Contact</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>@mdo</td>
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
                                  <td>Jacob</td>
                                  <td>Thornton</td>
                                  <td>@fat</td>
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
                                  <td>3</td>
                                  <td colspan="3">Larry the Bird</td>
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
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-master>
