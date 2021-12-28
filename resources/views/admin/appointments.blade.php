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

        @if(count($appointments) > 0)
        <div class="table-responsive">
            <table class="table">
            <thead>
            <tr>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Doctor Name
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Name
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Email
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Phone
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Date
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Message
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Status
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Created_at
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Approve
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Delete
                </th>
            </tr>
            </thead>

            <tbody>
                @foreach($appointments as $appointment)
                    <tr class="whitespace-nowrap">
                        <td class="px-6 py-4 text-sm text-white-500">
                                {{$appointment->doctor}}
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-white-900">
                                {{$appointment->name}}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-white-500">{{$appointment->email}}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-white-500">
                            {{$appointment->phone}}
                        </td>

                        <td class="px-6 py-4 text-sm text-white-500">
                            {{$appointment->date}}
                        </td>

                        <td class="px-6 py-4 text-sm text-white-500">
                            {{$appointment->message}}
                        </td>

                        <td class="px-6 py-4 text-sm text-white-500">
                            {{$appointment->status}}
                        </td>

                        <td class="px-6 py-4 text-sm text-white-500">
                            {{$appointment->created_at->diffForHumans()}}
                        </td>

                        <td class="px-6 py-4">
                            <a onclick="return confirm('Confirm Approvement ? ')" 
                                href="{{url('approve/appointment',$appointment->id)}}" 
                                class="px-4 py-1 text-sm text-white bg-red-400 rounded badge badge-success">
                                Approve
                            </a>
                        </td>

                        <td class="px-6 py-4">
                            <a onclick="return confirm('Are You Sure Cancel This Appointment ? ')" 
                                href="{{url('cancel/appointment',$appointment->id)}}" 
                                class="px-4 py-1 text-sm text-white bg-red-400 rounded badge badge-danger">
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
