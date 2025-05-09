<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">EduSupply</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('contractor.my.deliveries') }}" class="nav-link">
              <p>
                My Deliveries
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Profile Management
              </p>
            </a>
          </li> --}}
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <style>
.main-sidebar {
    background-color: #007bff !important;
}

.main-sidebar .nav-link {
    color: #ffffff !important;
    font-weight: 500;
}

.main-sidebar .nav-link.active {
    background-color: #0056b3 !important; 
    color: #ffffff !important;
}

.main-sidebar .nav-link:hover {
    background-color: #0056b3 !important;
    color: #ffffff !important;
}

.main-sidebar .brand-link {
    background-color: #0056b3 !important;
    color: #ffffff !important;
    font-weight: bold;
}

.main-sidebar .form-inline .form-control-sidebar {
    background-color: #ffffff !important;
    color: #333 !important;
}

.main-sidebar {
    min-height: 100vh;
    overflow-y: auto;
}

  </style>