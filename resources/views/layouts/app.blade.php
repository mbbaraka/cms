<?php
 use App\Setting;
 $settings = Setting::find(1); ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $settings->seo_desc }}" />
    <meta name="keywords" content="{{ $settings->seo_keywords }}" />
    <meta name="author" content="UAFCR IT Team" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UAFCR') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ $settings->favicon}}">
    <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ config('app.url') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
    <link rel="stylesheet" href="{{ config('app.url') }}/plugins/daterangepicker/daterangepicker.css">
  <!-- Data tables  -->
  <link rel="stylesheet" href="{{ config('app.url') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- date time ppicker -->
  <link rel="stylesheet" type="text/css" href="{{ config('app.url') }}/plugins/datetimepicker/css/tempusdominus-bootstrap-4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ config('app.url') }}/dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ config('app.url') }}/plugins/summernote/summernote-bs4.css">
  <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ config('app.url') }}/dist/css/magnific-popup.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @guest
            <div>
                @yield('login-content')
            </div>
        @else
        <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ config('app.url') }}" target="_blank" class="nav-link">Home</a>
                    </li>
                </ul>
                <!-- SEARCH FORM -->
                <form class="form-inline ml-3" action="index.php?id=search" method="post">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search" name="submit"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Account Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="logout.php">
                            Hi, {{ Auth::user()->name }} &nbsp;<i class="fa fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <div class="row justify-content-center">
                                <img src="{{ Auth::user()->avator }}" class="img-fluid" style="width: 100px; height: 110px;">
                            </div>
                            <div class="row justify-content-between pl-3 pr-3 pb-1">
                                <a href="#" class="btn-sm btn-success">
                                    <i class="fa fa-cog"></i> Settings
                                </a>
                                <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn-sm btn-success float-right">
                                    <i class="fa fa-power-off"></i> {{__('Logout') }}
                                </a>
                            </div>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="index.php" class="brand-link">
                    <img src="{{ $settings->logo}}" alt="Logo" class="brand-image img-circle elevation-3"
                         style="opacity: .8">
                    <span class="brand-text font-weight-light">UAFCR</span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="home" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        {{ __('Dashboard') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header">Front End Manager</li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-image"></i>
                                    <p>
                                        Media
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('galleries.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                {{__('Galleries')}}
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('banners.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('Banners') }}
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-blog"></i>
                                    <p>
                                        {{ __('Blog Management') }}
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('posts.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Posts') }}</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('categories.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Categories') }}</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('comments.index') }}" class="nav-link">
                                            <i class="far fa-comment nav-icon"></i>
                                            <p>{{ __('Comments') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('sermons.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-bible"></i>
                                    <p>
                                        {{ __('Sermons') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('events.index') }}" class="nav-link">
                                    <i class="nav-icon far fa-calendar-alt"></i>
                                    <p>
                                        {{ __('Events') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-envelope"></i>
                                    <p>
                                        {{ __('Subscribers') }}
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="index.php?id=publications" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Publications') }}</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('subscribers.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('All Subscribers') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('churches.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-church"></i>
                                    <p>
                                        {{ __('Churches') }}
                                    </p>
                                </a>
                            </li>
                            @php
                                $role = App\User::where('id', auth::user()->id)->where('role', 'admin')->first();
                            @endphp
                            @if($role)
                            <li class="nav-header">{{ __('Administration Management') }}</li>
                            <li class="nav-item">
                                <a href="{{ route('pages.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        {{ __('Pages') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route ('settings.index')}}" class="nav-link">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>
                                        {{ __('Settings') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('filemanager.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        {{ __('File Manager') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        {{ __('User Management') }}
                                    </p>
                                </a>
                            </li>
                            @endif

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            <div>
                @yield('content')
            </div>
            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    footer text
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; {{ date('Y') }} <a href="https://uafcr.org" target="_blank">UAFCR</a>.</strong> copyrght text
            </footer>
        @endguest
    </div>
<!-- jQuery -->
<script src="{{ config('app.url') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ config('app.url') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="{{ config('app.url') }}/plugins/select2/js/select2.full.min.js"></script>

<script src="{{ config('app.url') }}/plugins/moment/moment.min.js"></script>
<script src="{{ config('app.url') }}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="{{ config('app.url') }}/plugins/daterangepicker/daterangepicker.js"></script>

<script type="text/javascript" src="{{ config('app.url') }}/plugins/datetimepicker/js/tempusdominus-bootstrap-4.js"></script>
<!-- DataTables -->
<script src="{{ config('app.url') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ config('app.url') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="{{ config('app.url') }}/dist/js/adminlte.min.js"></script>
<!-- Magnific Popup -->
<script src="{{ config('app.url') }}/dist/js/jquery.magnific-popup.min.js"></script>
<script src="{{ config('app.url') }}/dist/js/magnific-popup-options.js"></script>
<!-- Summernote -->
<script src="{{ config('app.url') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Laravel File  Manager -->
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<!-- Page script -->
<script>
    $(function () {
        // Summernote
        $('.textarea').summernote()
    });
    $(function () {
        $("#table").DataTable();
    });
    //Initialising button to open file manager
    $('.lfm').filemanager('file');
    var route_prefix = "/admin/files";
    $('.lfm').filemanager('files', {prefix: route_prefix});
    $('#lfm').filemanager('file');
    var route_prefix = "/admin/files";
    $('#lfm').filemanager('files', {prefix: route_prefix});
</script>
<script>
    
  $(function () {

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
    $(function () {
        $("#table").DataTable();
    });
    //Initialising button to open file manager
    $('.lfm').filemanager('file');
    var route_prefix = "/admin/files";
    $('.lfm').filemanager('files', {prefix: route_prefix});
    $('#lfm').filemanager('file');
    var route_prefix = "/admin/files";
    $('#lfm').filemanager('files', {prefix: route_prefix});
</script>
<script>
    $(function () {
        // Summernote
        $('.textarea').summernote()
    })
     //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    CKEDITOR.replace( 'content' );

    function goBack(){
        window.history.back();
    }
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker7').datetimepicker();
        $('#datetimepicker8').datetimepicker({
            useCurrent: false
        });
        $("#datetimepicker7").on("change.datetimepicker", function (e) {
            $('#datetimepicker8').datetimepicker('minDate', e.date);
        });
        $("#datetimepicker8").on("change.datetimepicker", function (e) {
            $('#datetimepicker7').datetimepicker('maxDate', e.date);
        });
    });
</script>
</body>
</html>
