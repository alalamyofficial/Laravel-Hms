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
              <form action="{{url('send/email',$appointment->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
                  <div class="mb-3">
                    <label for="">Greetings</label>
                    <input type="text" name="greeting" class="form-control" placeholder="Enter a greeting">
                  </div>

                  <div class="mb-3">
                    <label for="">Body</label>
                    <input type="text" name="body" class="form-control" placeholder="Enter a Body">
                  </div>

                  <div class="mb-3">
                    <label for="">Action Text</label>
                    <input type="text" name="action_text" class="form-control" placeholder="Enter a Action">
                  </div>

                  <div class="mb-3">
                    <label for="">Action Url</label>
                    <input type="text" name="action_url" class="form-control" placeholder="Enter a Url">
                  </div>

                  <div class="mb-3">
                    <label for="">End Part</label>
                    <input type="text" name="action" class="form-control" placeholder="End">
                  </div>



                  <div class="mb-3">
                    <input type="Submit" value="submit" class="form-control">
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
