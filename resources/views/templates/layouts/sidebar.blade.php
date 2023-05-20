        <!-- Sidebar -->

       
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
            
     
            {{-- <ul class="navbar-nav bg-gradient-admin sidebar sidebar-dark accordion" id="accordionSidebar"> --}}
             
         <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
              <div class="logo d-flex align-items-center" >
                <img src="{{ asset('assets/img/logo.png') }}" alt="" widht="40" height="50">
                  {{-- <i class="fas fa-laugh-wink"></i> --}}
              </div>
              <div class="sidebar-brand-text mx-3">Kelurahan Airlangga </div>
              
          </a>

    
          <!-- Divider -->
          <hr class="sidebar-divider my-0">
         <!-- Nav Item - Dashboard -->
          @if(!Auth::user())

          <li class="nav-item">
            <a class="nav-link" href="/dashboard">
              <i class="icon-copy fa fa-home"></i>
                <span><strong>Dashboard</strong></span></a>
          </li>

          @endif



           
        @if(Auth::user())

            @if(Auth::user()->id_jabatan == '14')
                <li class="nav-item">
                    <a class="nav-link" href="/dashboardAdmin">
                    <i class="icon-copy fa fa-home"></i>
                    <span><strong>Dashboard</strong></span></a>
                </li>
            @else

            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                <i class="icon-copy fa fa-home"></i>
                    <span><strong>Dashboard</strong></span></a>
            </li>
            @endif

            
                <li class="nav-item">
                    <a class="nav-link" href="/log_aktivitas">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span><strong>Log Aktivitas</strong></span></a>
                </li>
            
            @if(Auth::user()->id_jabatan != '14')
            <li class="nav-item">
                <a class="nav-link" href="/display_laporan">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Print Laporan Aktivitas</strong></span></a>
            </li>
            @endif
            
        @if(Auth::user()->id_jabatan == '14')
            <li class="nav-item">
                <a class="nav-link" href="/daftar_pegawai">
                    <i class="icon-copy fa fa-address-book"></i>
                    <span><strong>Data Pegawai</strong></span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/daftar_kegiatan">
                    <i class="icon-copy fa fa-map"></i>
                    <span><strong>Pengajuan Kegiatan</strong></span></a>
            </li>
        @endif

@endif
            

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
              Halaman Utama
          </div>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                  aria-expanded="true" aria-controls="collapseTwo">
                  <i class="fas fa-fw fa-cog"></i>
                  <span>Landing Page</span>
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Custom Components:</h6>
                      <a class="collapse-item" href="buttons.html">Buttons</a>
                      <a class="collapse-item" href="cards.html">Cards</a>
                  </div>
              </div>
          </li>
          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

      </ul>
      <!-- End of Sidebar -->
