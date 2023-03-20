<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                
                <div class="col-lg-12 col-md-12 grid-margin strecth-card mt-2" >
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Database Outsourching</h4>
                            <p class="card-description">Data Outsourching</p>

                            <div class="table-responsive">
                                        <table id="dataTabels" class="table table-hover" >
                                                <thead>
                                                    <tr>
                                                        <th>ID Perusahaan</th>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Jumlah Tamu</th>
                                                        <th>Status Perusahaan</th>
                                                        <th>AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                            
                                                <?php foreach ($perusahaan as $perusahaan) :  ?>
                                                  <tr>  
                                                          <td><?= $perusahaan->id_perusahaan?></td>
                                                          <td><?= $perusahaan->perusahaan?></td>
                                                          <td><?= $perusahaan->jumlahKaryawan?></td>
                                                          <td><?php if($perusahaan->status_perusahaan == 1){
                                                                echo 'Aktif';
                                                          }else{
                                                            echo 'Tidak Aktif';
                                                          }?></td>
                                                          <td>
                                                          <a style="text-decoration:none;" href="#" class="btn-icon"> <i class="ti-pencil-alt"></i> Edit</a>
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

