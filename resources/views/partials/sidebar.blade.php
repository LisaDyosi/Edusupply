<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('login') }}" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">EduSupply</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="{{ route('system.overview') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                System Overview
              </p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="{{ route('user.roles') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                User Roles & Access
              </p>
            </a>
          <li class="nav-item">
            <a href="{{ route('guidelines') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Guidelines
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('support') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Support
              </p>
            </a>
          </li>
  </aside>