<!-- Topbar -->

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <form class="form-inline">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
      </button>
  </form>

  <!-- Topbar Search -->
 

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
     

      <!-- Nav Item - Alerts -->
      
      <!-- Nav Item - Messages -->
    

      {{-- <div class="topbar-divider d-none d-sm-block"></div> --}}

      <!-- Nav Item - User Information -->
      @if(Auth::user())
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->nama }}</span>
                <img class="img-profile rounded-circle" src="{{asset('assets/img/undraw_profile.svg')}}">
            </a>
    
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                   
                    <a class="dropdown-item" href="/profile/{{ Auth::user()->nama }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                 
                   
               
                    <a class="dropdown-item" href="/change_password/{{ Auth::user()->nama }}">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Reset Password
                    </a>
                    <a class="dropdown-item" href="/log_aktivitas">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                  
                </div>
            </li>
         
            @else
            <a href="/login" type="button" class="btn btn-primary">Masuk Sebagai Pegawai</a>
            @endif
  </ul>
  {{-- data-toggle="modal" data-target="#logoutModal" --}}
</nav>


<!-- End of Topbar -->