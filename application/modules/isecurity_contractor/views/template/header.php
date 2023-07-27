
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>I - SECURITY</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('assets/new/css/')?>feather.css">
  <link rel="stylesheet" href="<?= base_url('assets/new/css/')?>themify-icons.css">
  <link rel="stylesheet" href="<?= base_url('assets/new/css/')?>main.css">
  <link rel="stylesheet" href="<?= base_url('assets/new/css/')?>vendor.bundle.base.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="<?= base_url('assets/new/css/')?>style.css">
  
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <!-- <script src="<?= base_url('assets/new/js/')?>main.js"></script> -->
  <script src="<?= base_url('assets/new/js/')?>vendor.bundle.base.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="<?= base_url('assets/new/js/')?>echarts.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/')?>logo2.png" alt="logo" />
  <!-- Sweetalert Toast -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Leaflet -->
  <link rel="stylesheet" href="<?= base_url('assets/plugin/leaflet/leaflet.css')?>" />
  <script src="<?= base_url('assets/plugin/leaflet/leaflet.js')?>"></script>
  

</head>

<body>
 
  <div class="container-scroller d-flex flex-column min-vh-100">
    <!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="<?= base_url('dsh')?>"><img src="<?php echo base_url('assets/img/')?>logo2.png" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="<?= base_url('dsh')?>"><img src="<?php echo base_url('assets/img/')?>logo2.png" alt="logo"/></a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav mr-lg-2">
              <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                  <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                    <span class="input-group-text" id="search">
                      <i class="ti-search"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                </div>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="ti-bell mx-0"></i>
                  <span class="count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="ti-info mx-0"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">Application Error</h6>
                      <p class="font-weight-light small-text mb-0 text-muted">
                        Just now
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-warning">
                        <i class="ti-settings mx-0"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">Settings</h6>
                      <p class="font-weight-light small-text mb-0 text-muted">
                        Private message
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-info">
                        <i class="ti-user mx-0"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">New user registration</h6>
                      <p class="font-weight-light small-text mb-0 text-muted">
                        2 days ago
                      </p>
                    </div>
                  </a>
                </div>
              </li>
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                <?= $user->nama ?>
                
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item">
                    <i class="ti-settings text-primary"></i>
                    Settings
                  </a>
                  <a class="dropdown-item" href="<?= base_url('Login/Logout')?>">
                    <i class="ti-power-off text-primary"></i>
                    Logout
                  </a>
                </div>
              </li>
              <li class="nav-item nav-settings d-none d-lg-flex">
                <a class="nav-link" href="#">
                  <i class="icon-ellipsis"></i>
                </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="ti-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('dsh')?>">
                <i class="ti-layout-grid2 menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item mega-menu">
              <a href="#" class="nav-link">
              <i class="ti-bag menu-icon"></i>
              
                <span class="menu-title"> Security</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="submenu">
                <div class="col-group-wrapper row">

                <?php if(($user->security_operation) == 1 ) { ?>  
                <div class="col-group col-lg-3">
                    <div class="row">   
                      <div class="col-12">
                      <p class="category-heading">Security Operational</p>
                      <div class="submenu-item">
                        <div class="row">
                          <div class="col-md-6">
                            <ul>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('tamu')?>">Tamu</a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Kendaraan </a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Barang</a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('mutasi')?>">Outsourching</a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('mutasi')?>">Patroli</a></li>
                            </ul>
                          </div>
                          <div class="col-md-6">
                            <ul>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('agt')?>">Kontraktor</a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Laporan Harian </a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Laporan Kejadian</a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('mutasi')?>">Laporan Kehilangan</a></li>
                             
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>   
                    </div>
                </div>
                  <?php } ?>

                <?php if(($user->security_admin) == 1) {?>
                  <div class="col-group col-lg-3">
                    <div class="row">   
                      <div class="col-12">
                      <p class="category-heading">Security Admin</p>
                      <div class="submenu-item">
                        <div class="row">
                          <div class="col-md-6">
                            <ul>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('anggota')?>">Data Anggota</a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('SecAdm/Inventaris')?>">Inventaris</a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('SecAdm/Pembelian')?>">Pembelian</a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('SecAdm/Budget')?>">Budget</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>   
                    </div>
                </div>
                <?php } ?>

                <?php if(($user->layanan_security) == 1) {?>
                  <div class="col-group col-lg-3">
                    <div class="row">   
                      <div class="col-12">
                      <p class="category-heading">Layanan Security</p>
                      <div class="submenu-item">
                        <div class="row">
                          <div class="col-md-8">
                            <ul>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('tamu')?>">Tamu</a></li>
                              <li class="nav-item"><a class="nav-link" href="#">Dokumen</a></li>
                              <li class="nav-item"><a class="nav-link" href="#">Laporan Kehilangan</a></li>
                              <li class="nav-item"><a class="nav-link" href="#">Memo Security</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>   
                    </div>
                </div>
                <?php } ?>

                <?php if(($user->security_information) == 1) {?>
                  <div class="col-group col-lg-3">
                    <div class="row">   
                      <div class="col-12">
                      <p class="category-heading">Security Information</p>
                      <div class="submenu-item">
                        <div class="row">
                          <div class="col-md-8">
                            <ul>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('tamu')?>">News Paper</a></li>
                              <li class="nav-item"><a class="nav-link" href="#">Security & Tips</a></li>
                              <li class="nav-item"><a class="nav-link" href="#">Emergency News</a></li>
                              <li class="nav-item"><a class="nav-link" href="#">Hot News</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>   
                    </div>
                </div>
                <?php } ?>  
                </div>
              </div>
            </li>

            <?php if(($user->training)== 1) {?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="ti-medall menu-icon"></i>
                    <span class="menu-title">SGDP</span>
                  <i class="menu-arrow"></i>
              </a>
              <div class="submenu">
                <div class="row">
                  <div class="col-12">
                    <div class="submenu-item">
                      
                        <ul>
                          <li class="nav-item"><a class="nav-link" href="#">Materi</a></li>
                          <li class="nav-item"><a class="nav-link" href="#">Schedule</a></li>
                          <li class="nav-item"><a class="nav-link" href="#">Nilai</a></li>
                      </ul>
                      
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <?php } ?>

            <li class="nav-item mega-menu">
              <a href="#" class="nav-link">
              <i class="ti-bookmark-alt menu-icon"></i>
                <span class="menu-title"> Compliance</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="submenu">
                <div class="col-group-wrapper row">

                <?php if(($user->asms) == 1 ) { ?>  
                <div class="col-group col-lg-4">
                    <div class="row">   
                      <div class="col-12">
                      <p class="category-heading">ASMS</p>
                      <div class="submenu-item">
                        <div class="row">
                          <div class="col-md-6">
                            <ul>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('agt')?>">Checklist</a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Pemenuhan </a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Undang Undanga</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>   
                    </div>
                </div>
                <?php } ?>

                <?php if(($user->atsg) == 1) {?>
                  <div class="col-group col-lg-4">
                    <div class="row">   
                      <div class="col-12">
                      <p class="category-heading">ATSG</p>
                      <div class="submenu-item">
                        <div class="row">
                          <div class="col-md-6">
                            <ul>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('agt')?>">Checklist</a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Pemenuhan </a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Undang Undanga</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>   
                    </div>
                </div>
                <?php } ?>

                <?php if(($user->smp) == 1) {?>
                  <div class="col-group col-lg-4">
                    <div class="row">   
                      <div class="col-12">
                      <p class="category-heading">SMP</p>
                      <div class="submenu-item">
                        <div class="row">
                          <div class="col-md-8">
                            <ul>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('agt')?>">Checklist</a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Pemenuhan </a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Undang Undanga</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>   
                    </div>
                </div>
                <?php } ?>
                </div>
              </div>
            </li>
            <?php if(($user->control_database)== 1) {?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="ti-server menu-icon"></i>
                      <span class="menu-title">Control Database</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="submenu">
                  <div class="row">
                    <div class="col-12">
                      <div class="submenu-item">
                          <ul>
                            <li class="nav-item"><a class="nav-link" href="#">Perusahaan</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Kendaraan</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Karyawan</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Tamu</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Outsourching</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Kontraktor</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">User</a></li>
                          </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            <?php } ?>

            <li class="nav-item mega-menu">
              <a href="#" class="nav-link">
              <i class="ti-archive menu-icon"></i>
                <span class="menu-title"> Utility</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="submenu">
                <div class="col-group-wrapper row">

                <?php if(($user->review) == 1 ) { ?>  
                <div class="col-group col-lg-3">
                    <div class="row">   
                      <div class="col-12">
                      <p class="category-heading">Review</p>
                      <div class="submenu-item">
                        <div class="row">
                          <div class="col-md-6">
                            <ul>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('agt')?>">Budget</a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Project</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>   
                    </div>
                </div>
                <?php } ?>

                <?php if(($user->control_akun) == 1) {?>
                  <div class="col-group col-lg-3">
                    <div class="row">   
                      <div class="col-12">
                      <p class="category-heading">Control Akun</p>
                      <div class="submenu-item">
                        <div class="row">
                          <div class="col-md-6">
                            <ul>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('agt')?>">Checklist</a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Pemenuhan </a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Undang Undanga</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>   
                    </div>
                </div>
                <?php } ?>

                <?php if(($user->lo_g) == 1) {?>
                  <div class="col-group col-lg-3">
                    <div class="row">   
                      <div class="col-12">
                      <p class="category-heading">LOG</p>
                      <div class="submenu-item">
                        <div class="row">
                          <div class="col-md-8">
                            <ul>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('agt')?>">Checklist</a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Pemenuhan </a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Undang Undanga</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>   
                    </div>
                </div>
                <?php } ?>

                <?php if(($user->syncronize) == 1) {?>
                  <div class="col-group col-lg-3">
                    <div class="row">   
                      <div class="col-12">
                      <p class="category-heading">Syncronize</p>
                      <div class="submenu-item">
                        <div class="row">
                          <div class="col-md-8">
                            <ul>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('agt')?>">Checklist</a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Pemenuhan </a></li>
                              <li class="nav-item"><a class="nav-link" href="<?= base_url('NotFound')?>">Undang Undanga</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>   
                    </div>
                </div>
                <?php } ?>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>