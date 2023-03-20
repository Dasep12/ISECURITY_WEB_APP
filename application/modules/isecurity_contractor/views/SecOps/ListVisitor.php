
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


<div class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
              <div class="card-body">
                  <h4 class="info-box-text">Daftar Visitor</h4>
                <h6 class="info-box-text">Visitor <?= $user->area_kerja . '|' . $user->wilayah?></h6> 
                  <div class="row">
                     <div class="col-md-12 col-xl-12 d-flex flex-column justify-content-start">
                        <div class="table-responsive scrollbar">
                              <table id="dataTabels" class="table table-hover" >
                                      <thead >
                                          <tr>
                                              <th>NO</th>
                                              <th>ID TRANSAKSI</th>
                                              <th>NAMA TAMU</th>
                                              <th>BERTEMU</th>
                                              <th>KEPENTINGAN</th>
                                          </tr>
                                      </thead> 
                                      <tbody>
                                      <?php
                                          $i = 1;
                                          foreach($tamu as $tamu) : ?>
                                          <tr>
                                                  <td class="text-left"><?= $i ?></td>
                                                  <td class="text-left"><?= $tamu->id_transaksi ?></td>
                                                  <td class="text-left"><?= $tamu->namaTamu?></td>
                                                  <td class="text-left"><?= $tamu->nama?></td>
                                                  <td class="text-left"><?= $tamu->kepentingan?></td>
                                                  
                                          </tr>
                                          <?php
                                          $i++;
                                      endforeach ?>
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

