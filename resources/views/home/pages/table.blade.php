
@extends('home.app')
@section('main')


    <!-- End Navbar -->
    <div class="container-fluid py-4">
        @if(session()->has('success'))
        <div class="alert alert-info text-white alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

      <div class="row">
        
        <div class="col-12">
            
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Devices</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($device as $dev)
                    <tr>
                      <td>
                        <div class="d-flex px-2 p-2">
                         
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$dev->nama}}</h6> 
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$dev->deskripsi}}</p> 
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm @if($dev->status == 'Active') bg-gradient-success @else bg-gradient-danger  @endif">{{$dev->status}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$dev->created_at}}</span>
                      </td>
                      <td class="align-middle">
                        <button type="button" class="badge bg-warning text-white font-weight-bold text-xs border-0" data-bs-toggle="modal" data-bs-target="#edit{{$dev->id}}">
                            Edit
                        </button>

                        {{-- edit --}}
                        <div class="modal fade" id="edit{{$dev->id}}" tabindex="-1" aria-labelledby="#edit{{$dev->id}}" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="#edit{{$dev->id}}">Tambah Device</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{url('/admin/table/'.$dev->id)}}" method="post">
                                    @method('PUT')
                                    @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama device</label>
                                        <input type="text" class="form-control border p-2" id="nama" name="nama" value="{{$dev->nama}}" required> 
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <input type="text" class="form-control border p-2" id="deskripsi" name="deskripsi" value="{{$dev->deskripsi}}" required> 
                                    </div> 
                                </div>
                                <input type="hidden" name="id" value="{{$dev->id}}">
                                
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                                </div>
                                </div>
                            </div>
                            {{-- end edit --}} 
                        <form action="{{url('/admin/table/'.$dev->id)}}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="id" value="{{$dev->id}}">
                        <button type="submit"  class="badge bg-danger text-white font-weight-bold text-xs border-0" onclick="confirm('apakah anda ingin menghapus')">
                          Delete
                        </button>
                    </form>
                      </td>
                    </tr> 
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>  
      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Device</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('/admin/table')}}" method="post">
                @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">Name</label>
                    <input type="text" class="form-control border p-2" id="nama" name="nama" required> 
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Description</label>
                    <input type="text" class="form-control border p-2" id="deskripsi" name="deskripsi" required> 
                </div> 
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
        </div>
    </div>

@endsection
