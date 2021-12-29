<div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">

              </div>
            </div>
            <div class="row">
              <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{count($users)}}</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Users</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{count($doctors)}}</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Doctors</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{count($appointments)}}</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Appointments</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                      <img src="{{asset('hospital.gif')}}" alt="">
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex mb-3 flex-row justify-content-between">
                      <h4 class="card-title mb-1">Lastest Appointments</h4>
                      <p class="text-muted mb-1">Your data status</p>
                    </div>

                    @foreach($appointments as $appointment)
                    <div class="preview-item border-bottom mb-3">
                        <div class="preview-item-content d-sm-flex flex-grow">
                          <div class="flex-grow">
                            <h6 class="preview-subject">{{$appointment->name}}</h6>
                            <p class="text-muted mb-0">{{$appointment->message}}</p>
                          </div>
                          <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                            <p class="text-muted">{{$appointment->created_at->diffForHumans()}}</p>
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
    </div>



    </div>
</div>