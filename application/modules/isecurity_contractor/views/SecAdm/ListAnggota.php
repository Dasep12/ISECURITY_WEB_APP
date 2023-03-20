

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat Datang  <?= $user->nama?></h3>
                  <h6 class="font-weight-normal mb-0">Ini Adalah Halaman Anggota Berdasarkan Wilayah</h6>
                </div>
              </div>
            </div>
          </div>
        
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-justify card">
                <div class="card-body">
                  <p class="card-title ">Main Power Anggota <span><?= $user->area_kerja?></span></p>
                  <h3 class="font-weight-500 mb-xl-4 ">Anggota <?php if($user->wilayah == "WIL2"){
                                echo 'Wilayah 2';
                              }elseif ($user->wilayah == "WIL1") {
                                echo 'Wilayah 1';
                              }elseif ($user->wilayah == "WIL3") {
                                echo 'Wilayah 3';
                              }else {
                                echo 'Wilayah 4';
                              } ?></h3>
                       
                           
                        <div class="row">
                          <div class="col-md-12 col-xl-12 d-flex flex-column justify-content-start">

                                    <div class="table-responsive">
                                        <table id="dataTabels" class="table table-hover" >
                                                <thead>
                                                    <tr>
                                                        <th>NPK</th>
                                                        <th>NAMA</th>
                                                        <th>AREA KERJA</th>
                                                        <th>WILAYAH</th>
                                                        <th>AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                            
                                                <?php foreach ($anggota as $anggota) :  ?>
                                                  <tr>  
                                                          <td><?= substr($anggota->id_biodata,4)?></td>
                                                          <td><?= $anggota->nama?></td>
                                                          <td><?= $anggota->area_kerja?></td>
                                                          <td><?= $anggota->wilayah?></td>
                                                          <td>
                                                          <a style="text-decoration:none;" href="<?= base_url('profile/').$this->murry->enkrip($anggota->id_biodata)?>" class="btn-icon"> <i class="ti-user"></i> Profile</a>
                                                          </td>
                                                    </tr>   
                                                  
                                                  <?php endforeach ?>
                                                </tbody>
                                        </table>
                                    </div>

                          </div>
                        </div> 
                  </div>
                </div>
              </div>
            </div>
          </div>
           
        </div> 