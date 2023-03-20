<?php
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ISECURITY</title>
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


    <link rel="stylesheet" href="<?= base_url('assets/dist/css/info.css') ?>">

    <script src='https://cdn.plot.ly/plotly-2.16.1.min.js'></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.0/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.0/dist/leaflet.js" integrity="sha256-oH+m3EWgtpoAmoBO/v+u8H/AdwB/54Gc/SgqjUKbb4Y=" crossorigin=""></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/dist') ?>/js/kuma-gauge.jquery.js"></script>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
            <div class="container">
                <a href="<?= base_url('Menu') ?>" class="navbar-brand">
                    <img src="<?= base_url('assets/dist/img/logo.jpeg') ?>" alt="AdminLTE Logo" class="brand-image elevation-5" style="margin-left:-60px;margin-top:3px">
                    <span class="btn btn-primary btn-sm brand-text font-weight-light">
                        <i class="fas fa-home"></i>
                    </span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= base_url('analitic/information/Anggota/dashboard') ?>" class="nav-link ">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('analitic/information/Data') ?>" class="nav-link">Data Anggota</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <div class="content">
                <?= $contents ?>
                <!-- <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                        </div>
                    </div>
                </div> -->
            </div>

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
        $("#table_id").DataTable({
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