<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ecomart</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('dashboard-assets') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('dashboard-assets') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dashboard-assets') }}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{ asset('dashboard-assets') }}/plugins/toastr/toastr.css">

   <!-- summernote -->
   <link rel="stylesheet" href="{{ asset('dashboard-assets') }}/plugins/summernote/summernote-bs4.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('dashboard-assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('dashboard-assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('dashboard-assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

@guest

@else
<div class="wrapper">

  <!-- Navbar -->
    @include('layouts.admin_partial.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.admin_partial.sidebar')
  <!-- End Main Sidebar Container -->

@endguest
  <!-- Content Wrapper. Contains page content -->
    @yield('admin_content')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('dashboard-assets') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('dashboard-assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('dashboard-assets') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dashboard-assets') }}/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('dashboard-assets') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{ asset('dashboard-assets') }}/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('dashboard-assets') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{ asset('dashboard-assets') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('dashboard-assets') }}/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dashboard-assets') }}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dashboard-assets') }}/dist/js/pages/dashboard2.js"></script>
<script src="{{ asset('dashboard-assets') }}/plugins/toastr/toastr.min.js"></script>
<!-- <script src="{{ asset('dashboard-assets') }}/plugins/sweetalert/sweetalert.min.js"></script> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;
        } else {
            swal("Your imaginary file is safe!");
        }
        });
    });
</script>
    <script>
        $(document).on("click", "#logout", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Are you Want to logout?",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                swal("Not Logout!");
                }
            });
        });
</script>
<script>
  @if(Session::has('messege'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
        case 'info':
            toastr.info("{{Session::get('messege') }}");
            break;
        case 'success':
            toastr.success("{{Session::get('messege') }}");
            break;
        case 'warning':
            toastr.warning("{{Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{Session::get('messege') }}");
            break;
    }
  @endif
</script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('dashboard-assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('dashboard-assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('dashboard-assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('dashboard-assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('dashboard-assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('dashboard-assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('dashboard-assets') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('dashboard-assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('dashboard-assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('dashboard-assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('dashboard-assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('dashboard-assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="{{ asset('dashboard-assets') }}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
