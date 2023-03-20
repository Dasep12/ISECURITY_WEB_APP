<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4 class="info-box-text">Selamat Datang <?= $user->nama?></h4>
        <h6 class="info-box-text">Ini Adalah Menu Melakukan Administrasi <span class="text-primary"><?= $user->area_kerja?>!</span></h6>
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
                        <h4 class="card-title">Control Karyawan</h4>
                    </div>
                </div>
            </div>

       
            <div class="col-6 col-lg-12 col-md-12 col-sm-12">
                <div class="info-box">
                        <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="col-10">
                                        <span class="info-box-number">Data Karyawan</span>
                                    </div>
                                    <div class="col-2">
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                <div class="table-responsive scrollbar">
                                    <table id="AksesAdmin" class="table table-hover" >
                                            <thead >
                                                <tr>
                                                    <th>ID KARYAWAN</th>
                                                    <th>NPK</th>
                                                    <th>NAMA</th>
                                                    <th>DIVISI</th>
                                                    <th>DEPARTMENT</th>
                                                    <th>JABATAN</th>
                                                    <th>LOKASI TUGAS</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead> 
                                            
                                    </table>
                                </div>
                                </div>
                        </div>
                </div>
            </div>
           
          <!--  -->
        </div>
    </div>
</section>