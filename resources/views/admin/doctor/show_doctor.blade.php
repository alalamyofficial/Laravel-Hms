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

            <h1 class="mb-3">Appointments</h1>           

        @if(count($doctors) > 0)
        <div class="table-responsive">
            <table class="table">
            <thead>
            <tr>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Name
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Phone
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Speciality
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Room
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Image
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Created_at
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Edit
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Delete
                </th>
            </tr>
            </thead>

            <tbody id="myTable">
                @foreach($doctors as $doctor)
                    <tr class="whitespace-nowrap">

                        <td class="px-6 py-4">
                            <div class="text-sm text-white-900">
                                {{$doctor->name}}
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-white-500">
                            {{$doctor->phone}}
                        </td>

                        <td class="px-6 py-4 text-sm text-white-500">
                            {{$doctor->speciality}}
                        </td>

                        <td class="px-6 py-4 text-sm text-white-500">
                            {{$doctor->room}}
                        </td>

                        <td>
                            <img src="{{asset($doctor->image)}}" width="100px" alt="">
                        </td>

                        <td class="px-6 py-4 text-sm text-white-500">
                            {{$doctor->created_at->diffForHumans()}}
                        </td>

                        <td class="px-6 py-4">
                            <a href="{{url('edit/doctor',$doctor->id)}}" 
                                class="px-4 py-1 text-sm text-white bg-red-400 rounded badge badge-success btn-sm">
                                Edit
                            </a>
                        </td>

                        <td class="px-6 py-4">
                            <a onclick="return confirm('Are You Sure Cancel This Appointment ? ')" 
                                href="{{url('delete/doctor',$doctor->id)}}" 
                                class="px-4 py-1 text-sm text-white bg-red-400 rounded badge badge-danger btn-sm">
                                Delete
                            </a>
                        </td>
                    </tr>


                @endforeach
            </tbody>

            </table>
        </div>

        @else
        
            <b>
                <center class="mt-3 mb-3">No Appointments Found</center>
            </b>

        @endif


        </div>
    </div>        
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>

@include('admin.footer')
