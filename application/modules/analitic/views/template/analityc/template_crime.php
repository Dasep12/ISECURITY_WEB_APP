<?php
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Security Guard Tour</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/assets/dist/img/logo.jpeg">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- DataTables -->

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css?<?= date('Y-m-d H:i:s') ?>">
    <!-- jQuery -->
    <!-- <script src="<?= base_url('assets') ?>/dist/js/jquery.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

    <!-- tags input -->

    <script src='https://cdn.plot.ly/plotly-2.16.1.min.js'></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.0/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.0/dist/leaflet.js" integrity="sha256-oH+m3EWgtpoAmoBO/v+u8H/AdwB/54Gc/SgqjUKbb4Y=" crossorigin=""></script>

    <style type="text/css">
        #map2 {
            height: 400px;
        }

        #map {
            height: 400px;
        }

        #map_karawang {
            height: 400px;
        }

        .row>* {
            padding: 10px 0;
        }

        .cardIn {
            border: none;
            border-width: 1px 1px 1px 1px;
            border-color: #ccc;
            border-style: solid;
            border-radius: 0
        }

        .cardIn2 {
            border: none;
            border-width: 1px 0px 1px 1px;
            border-color: #ccc;
            border-style: solid;
            border-radius: 0
        }

        ul .first {
            margin-right: 10px;
        }

        ul .five,
        .third {
            margin-left: 14px;
        }

        .first::marker {
            content: url('https://www.securityadm.my.id/isec/assets/img/info/list_icon.png');
            padding-left: 20px;
            position: relative;
        }

        .second::marker {
            content: url('https://www.securityadm.my.id/isec/assets/img/info/list_icon_2.png');
        }

        .third::marker {
            content: url('https://www.securityadm.my.id/isec/assets/img/info/list_icon_3.png');
        }

        .four::marker {
            content: url('https://www.securityadm.my.id/isec/assets/img/info/list_icon_4.png');
        }

        .five::marker {
            content: url('https://www.securityadm.my.id/isec/assets/img/info/list_icon_5.png');
        }

        .dropbtn {
            background-color: #04AA6D;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover,
        .dropbtn:focus {
            background-color: #3e8e41;
        }

        #myDropdown2 a:hover,
        #myDropdown a:hover {
            background-color: #3e8e41;
            cursor: pointer;

        }

        #myInput {
            box-sizing: border-box;
            background-image: url('searchicon.png');
            background-position: 14px 12px;
            background-repeat: no-repeat;
            font-size: 16px;
            padding: 14px 20px 12px 45px;
            border: none;
            border-bottom: 1px solid #ddd;
        }

        #myInput:focus {
            outline: 3px solid #ddd;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f6f6f6;
            min-width: 230px;
            overflow: auto;
            border: 1px solid #ddd;
            z-index: 999;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* .dropdown a:hover {
      background-color: #ddd;
    } */

        .show {
            display: block;
        }

        .show_hide {
            display: none;
        }
    </style>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/dist') ?>/js/kuma-gauge.jquery.js"></script>
</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-navbar-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <a href="<?= base_url('Menu') ?>" class="btn btn-primary btn-sm"><i class="fas fa-home"></i></a>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto text-white">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item mr-2">
                    <span class="font-italic font-bold">Welcome <?= $this->session->userdata('name') ?></span>
                </li>
                <li class="nav-item">
                    <a class=" btn btn-sm btn-info" href="<?= base_url('Logout') ?>">
                        <i class="fas fa-user"></i> LOGOUT
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <!-- <aside class="main-sidebar sidebar-dark-primary elevation-4"> -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('assets') ?>/index3.html" class="brand-link">
                <img src="<?= base_url('assets') ?>/dist/img/logo.jpeg" alt="AdminLTE Logo" style='margin-left:2px' class="brand-image img-square elevation-5" style="opacity: .8">

                <label class="brand-text font-bold font-weight-light" style="font-size: 14px"><b>ASTRA DAIHATSU MOTOR</b></label>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets') ?>/dist/img/security.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block" style="font-size: 14px">SECURITY RISK SURVEY</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="<?= base_url('analitic/crime/Crime/Dashboard') ?>" class="nav-link
                            <?php if ($this->uri->segment(4) == 'Dashboard') {
                                echo 'active';
                            } ?>">
                                <i class="nav-icon fas fa-tachometer-alt "></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?= base_url('analitic/crime/Crime/upload') ?>" class="nav-link
                            <?php if ($this->uri->segment(4) == 'upload') {
                                echo 'active';
                            } ?>">
                                <i class="nav-icon fas fa-file-excel"></i>
                                <p>
                                    Upload Crime
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?= $contents ?>

            <!-- Main content -->

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer fixed">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2022 <a href="#">ISECURITY</a></strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets') ?>/dist/js/bootstrap.min.js"></script>
    <!--<script src="<?= base_url('assets') ?>/dist/js/bootstrap.bundle.min.js"></script>-->
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js?<?= date('Y-m-d H:i:s') ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets') ?>/dist/js/demo.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('assets') ?>/dist/js/vendor/jszip/jszip.min.js"></script>

    <!-- Select2 -->
    <script src="<?= base_url('assets') ?>/dist/select2/js/select2.full.min.js"></script>
    <!-- date-range-picker -->
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
</body>
<script>
    $(document).ready(function() {
        $("#example").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        })
    });
</script>

</html>