<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
   <span class="brand-text font-weight-light">EduSupply</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item">
              <a class="nav-link" href="{{ route('department.schools.index') }}" class="nav-link">
              <p>
                Manage Schools
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Stationery Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
              Manage Schools
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="{{ route('department.contractors.index') }}" class="nav-link">
              <p>
              Manage Contractors
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
              View Requests 
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