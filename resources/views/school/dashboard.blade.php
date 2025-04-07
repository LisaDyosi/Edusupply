@extends('layouts.app')

@section('title', 'School Dashboard')

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

@section('content')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  <div class="content">
    <header>
        <h1>School Dashboard</h1>
        <p>Manage received and pending deliveries.</p>
    </header>

    <section class="dashboard-grid">
        <div class="card">
            <h3>📦 Delivery Status</h3>
            <canvas id="schoolDeliveryChart"></canvas>
        </div>

        {{-- <div class="card">
            <h3>✅ Confirm Delivery</h3>
            <button class="btn">Enter Confirmation</button>
        </div> --}}

        <div class="card">
            <h3>📝 Request Stationery</h3>
            <button class="btn">Submit Request</button>
        </div>

        <div class="card">
            <h3>⚠️ Discrepancy Reports</h3>
            <button class="btn">Log Missing Items</button>
        </div>
    </section>
    
    <div class="container">
      <h3 class="text-primary">📦 Upcoming Deliveries</h3>
      <table class="table">
          <thead>
              <tr>
                  <th>Stationery</th>
                  <th>Quantity</th>
                  <th>Status</th>
              </tr>
          </thead>
          <tbody>
              @foreach (Auth::user()->allocations as $allocation)
                  <tr>
                      <td>{{ $allocation->stationery->name }}</td>
                      <td>{{ $allocation->quantity }}</td>
                      <td>{{ ucfirst($allocation->status) }}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div> 

<style>
.content { 
  padding: 20px; 
  background: #f4f4f9; 
}

.dashboard-grid { 
  display: grid; 
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
  gap: 20px; 
  margin-top: 20px; 
}

.card { 
  background: white; 
  padding: 20px; 
  border-radius: 10px; 
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
  transition: transform 0.3s; 
}

.card:hover { 
  transform: translateY(-5px); 

}

.btn { 
  background: #007bff; 
  color: white; 
  padding: 10px; 
  border-radius: 5px; 
  border: none; 
  cursor: pointer; 
  margin-top: 10px; 
}

.btn:hover { 
  background: #0056b3; 
}

</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('schoolDeliveryChart').getContext('2d');
new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Received', 'Pending'],
        datasets: [{ data: [80, 20], backgroundColor: ['#28a745', '#ffc107'] }]
    }
});
</script>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
@endsection
</html>
