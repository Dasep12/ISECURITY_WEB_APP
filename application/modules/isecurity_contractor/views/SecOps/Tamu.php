

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat Datang <?= $user->nama?></h3>
                  <h6 class="font-weight-normal mb-0">Ini Adalah Menu Melakukan Administrasi Anggota <span class="text-primary"><?= $user->area_kerja?>!</span></h6>
                </div>
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="<?php  echo base_url('assets/')?>berangkat.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div class="ms-2">
                        <h4 class="location font-weight-normal">Tamu</h4>
                        <h6 class="font-weight-normal">Masuk</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="<?php  echo base_url('assets/')?>pulang.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div class="ms-2">
                        <h4 class="location font-weight-normal">Tamu</h4>
                        <h6 class="font-weight-normal">Keluar</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="<?php  echo base_url('assets/')?>onduty.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div class="ms-2">
                        <h4 class="location font-weight-normal">Tamu</h4>
                        <h6 class="font-weight-normal">On Area</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                     <a href="<?php echo base_url('SecOps/Tamu/InputVisitor')?>" class="text-white" style="text-decoration:none;">
                     <p class="mb-2"></p>
                     <p class="fs-30 mb-2"> Visitor</p>
                    </a>
                    </div>
                  </div>
                </div>
               

                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                    <a href="<?php echo base_url('SecOps/Tamu/DataTamu')?>" class="text-white" style="text-decoration:none;">
                     <p class="mb-2"></p>
                     <p class="fs-30 mb-2">Data Tamu</p>
                    </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                    <a href="<?php echo base_url('agt/').$this->murry->enkrip($user->area_kerja).'' ;?>" class="text-white" style="text-decoration:none;">
                     <p class="mb-2"></p>
                     <p class="fs-30 mb-2">Scan In Out</p>
                    </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                     <a href="<?php echo base_url('SecOps/Tamu/inputPerusahaan')?>" class="text-white" style="text-decoration:none;">
                     <p class="mb-2"></p>
                     <p class="fs-30 mb-2"> Database Perusahaan</p>
                    </a>
                    </div>
                  </div>
                </div>
               

                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                    <a href="<?php echo base_url('SecOps/Tamu/DataTamu')?>" class="text-white" style="text-decoration:none;">
                     <p class="mb-2"></p>
                     <p class="fs-30 mb-2">Database Tamu</p>
                    </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                    <a href="<?php echo base_url('agt/').$this->murry->enkrip($user->area_kerja).'' ;?>" class="text-white" style="text-decoration:none;">
                     <p class="mb-2"></p>
                     <p class="fs-30 mb-2">List Visitor</p>
                    </a>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
          
           
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <p class="card-title">Detail Anggota</p>
                  <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                            <div class="ml-xl-4 mt-3">
                            <p class="card-title">Total Anggota </p>
                              <h1 class="text-primary"><?= $jumlahAnggota?> MP</h1>
                              <h3 class="font-weight-500 mb-xl-4 text-primary">Anggota <?php if($user->wilayah == "WIL2"){
                                echo 'Wilayah 2';
                              }elseif ($user->wilayah == "WIL1") {
                                echo 'Wilayah 1';
                              }elseif ($user->wilayah == "WIL3") {
                                echo 'Wilayah 3';
                              }else {
                                echo 'Wilayah 4';
                              } ?></h3>
                              <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                            </div>  
                            </div>
                         
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
  