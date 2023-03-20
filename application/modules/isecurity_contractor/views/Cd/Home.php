<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4 class="info-box-text">Selamat Datang <?= $user->nama?></h4>
        <h6 class="info-box-text">Ini Adalah Menu Melakukan Administrasi Visitor <span class="text-primary"><?= $user->area_kerja?>!</span></h6>
      </div>
    </div> 
  </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Control Database Perusahaan</h4>
                    </div>
                </div>
            </div>

        <div class="col-6 col-lg-4 col-md-4 col-sm-6">
                <div class="info-box">
                        <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="col-8">
                                    <a href="<?= base_url('isecurity_contractor/Cd/Perusahaan/')?>UserControl" class="text-dark">
                                        <span class="info-box-text">Control User Akses</span>
                                        <span class="info-box-number">14330 User</span>
                                        <span class="info-box-text">All Area</span>
                                    </div>
                                    </a>
                                    <div class="col-4">
                                    <i class="fa fa-users fa-3x " aria-hidden="true"></i>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>

            <div class="col-6 col-lg-4 col-md-4 col-sm-6">
                <div class="info-box">
                        <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="col-8">
                                     <a class="text-dark" href="<?= base_url('isecurity_contractor/Cd/Perusahaan/')?>DepartDivisi">
                                    <span class="info-box-text">Department & Divisi</span>
                                    <span class="info-box-number">Control</span>
                                    <span class="info-box-text">All Area</span>
                                    </a>
                                    </div>
                                    <div class="col-4">
                                    <i class="fa fa-handshake fa-3x " aria-hidden="true"></i>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>

            <div class="col-6 col-lg-4 col-md-4 col-sm-6">
                <div class="info-box">
                        <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="col-8">
                                    <a class="text-dark" href="<?= base_url('isecurity_contractor/Cd/')?>Karyawan">
                                    <span class="info-box-text">Karyawan</span>
                                    <span class="info-box-number">14330 Pekerja</span>
                                    <span class="info-box-text">All Area</span>
                                    </a>
                                    </div>
                                    <div class="col-4">
                                    <i class="fa fa-address-card fa-3x " aria-hidden="true"></i>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>

           

        </div>
    </div>
</section>