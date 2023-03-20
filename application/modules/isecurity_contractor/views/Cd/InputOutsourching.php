<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pendaftaran Outsourching</h4>
                            <p class="card-description">Harap dipastikan bahwa perusahaan belum terdaftar sebelumnya</p>
                            <form action="" class="form-sample" method="POST" id="CdOutsourching">
                                <p class="personal info"></p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="perusahaan" id="perusahaan"/>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="card-description">Status</p>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">OFF / ON</label>
                                            <div class="col-sm-9 col-form-label  form-switch">
                                            <input class="form-check-input" id="status" name="status" value="1" type="checkbox" onclick='handleClick(this);'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6 d-flex start-end">
                                        <div class="form-group row">
                                       <div class="col-sm-9">
                                       <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                       </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 grid-margin strecth-card mt-2" >
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Database Perusahaan</h4>
                            <p class="card-description">Data Perusahaan</p>

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

