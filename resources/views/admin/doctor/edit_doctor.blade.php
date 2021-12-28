@include('admin.header')

<div class="container-scroller">
  <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->

    @include('admin.navbar')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            @if(session()->has('message'))
              <div class="alert alert-success">
                <button class="close" data-dismiss="alert">x</button>
                {{session()->get('message')}}
              </div>
            @endif

            <div class="d-flex">
              <h1 class="mb-4 mt-1">Add Doctor</h1> 
              <a href="{{url('/doctors')}}" class="btn btn-primary btn-fw ml-4 mb-4"> View Doctors</a>
            </div>

            <hr class="mb-3" style="background-color:white">

            <div class="container">
              <form action="{{url('update/doctor',$doctor->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
                  <div class="mb-3">
                    <label for="">Doctor Name</label>
                    <input type="text" name="name" value="{{$doctor->name}}" class="form-control" placeholder="Enter a name">
                  </div>

                  <div class="mb-3">
                    <label for="">Phone</label>
                    <input type="text" name="phone"  value="{{$doctor->phone}}" class="form-control" placeholder="Enter a Phone">
                  </div>

                  <div class="mb-3">
                    <label for="">Speciality <small>({{$doctor->speciality}})</small></label>
                    <select name="speciality" id="" class="form-control">
                      <option>--select--</option>
                      <option value="skin">skin</option>
                      <option value="heart">heart</option>
                      <option value="eye">eye</option>
                      <option value="nose">nose</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="">Room No</label>
                    <input type="text" name="room"  value="{{$doctor->room}}" class="form-control" placeholder="Enter a Room Number">
                  </div>

                  <div class="d-flex">
                    <div class="mb-3">
                        <label for="">Doctor Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div>
                        <img src="{{asset($doctor->image)}}" width="50px" class="mt-4" alt="">
                    </div>

                  </div>  

                  <div class="mb-3">
                    <input type="Submit" value="Update" class="form-control">
                  </div>

              </form>
            </div>

        </div>
    </div>        
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>

@include('admin.footer')
