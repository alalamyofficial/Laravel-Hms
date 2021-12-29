<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html">
            <b class="p-4" style="color:white">
                One-Health
            </b>
        </a>
        <a class="sidebar-brand brand-logo-mini" href="index.html">
            <img src="{{asset('admin/assets/images/logo-mini.svg')}}" alt="logo" />
        </a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
        <div class="profile-desc">
            <div class="profile-pic">
            <div class="count-indicator">
                <img class="img-xs rounded-circle " src="{{asset('admin/assets/images/faces/face15.jpg')}}" alt="">
                <span class="count bg-success"></span>
            </div>
                <div class="profile-name">
                    <h5 class="mb-0 font-weight-normal">{{Auth::user()->name}}</h5>
                </div>
            </div>
        </div>
        </li>
        <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('home')}}">
                <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('add/doctor')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-account-multiple-plus"></i>
                </span>
                <span class="menu-title">Add Doctor</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('appointments')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-calendar"></i>
                </span>
                <span class="menu-title">Appointments</span>
            </a>
        </li>

    </ul>
</nav>