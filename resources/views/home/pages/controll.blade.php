@extends('home.app')
@section('main')  
 
<div class="container-fluid py-4"> 
<div class="row">
  <div class="col-12 ">
 
    <div class="card my-4 bg-light  shadow">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Controls</h6>
        </div>
      </div>
      <div class="card-body px-0 pb-2 bg-light p-3 m-3">
        <div class="row">
          @foreach($device as $dev)
          <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4 ">
            <div class="card ">
              <div class="card-header p-3 pt-2">
                 
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">power_settings_new</i>
                </div> 

                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">{{$dev->nama}}</p>
                  <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2"> 
                      <div class="form-check form-switch"> 
                        <input   class="form-check-input fs-5" type="checkbox" @if ($dev["status"] == "Active") checked @endif
                         id ='{{$dev["id"] }}' onchange="sendData(this)" data-onstyle="primary" data-offstyle="danger" width="100"  >  
                    </div>
                    </div>
                  </div>
                  
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class=" text-sm font-weight-bolder">{{$dev->deskripsi}}</p>
              </div>
            </div>
          </div> 
          @endforeach
          </div>
      </div>
    </div>
  </div>  
</div>
</div>
   

      <script>
        //send data
        function sendData(e) {
            var xhr = new XMLHttpRequest();
            if (e.checked) {
                xhr.open("GET", "/admin/device/switchoff/" + e.id  , true);
            } else {
                xhr.open("GET", "/admin/device/switchon/" + e.id  , true);
            } 
            xhr.send();
        } 
 
    </script> 
      

@endsection
