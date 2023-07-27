<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pendaftaran Database Tamu</h4>
                            <p class="card-description">Personal Info</p>
                            <form action="" class="form-sample" method="POST" id="daftarTamu">
                                <p class="personal info"></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Nama Lengkap Tamu</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="namaTamu" id="namaTamu"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Nomor KTP/Passport </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="noKtp" name="noKtp"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Alamat Tempat Tinggal</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="alamatTempatTinggal" name="alamatTempatTinggal"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Nomor Telphone</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="no_hp" name="no_hp"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Nomor Polisi Kendaraan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nomorPolisiKendaraan" name="nomorPolisiKendaraan"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Warga Negara</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="wargaNegara" name="wargaNegara"/>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Perusahaan</label>
                                            <div class="col-sm-9">
                                            <select  id="getperusahaan" name="perusahaan" class="form-select">
                                                    <option value='0'> -- Pilih Perusahaan -- </option>
                                            </select>
                                          
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Foto</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" id="file" name="file" onchange="return ocrKTP()"/>
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
                            <h4 class="card-title"> Database Tamu</h4>
                            <p class="card-description">Data Tamu</p>

                            <div class="table-responsive">
                                        <table id="dataTabels" class="table table-hover" >
                                                <thead>
                                                    <tr>
                                                        <th>ID Tamu</th>
                                                        <th>Nama Tamu</th>
                                                        <th>No Kendaraan </th>
                                                        <th>No Telphone</th>
                                                        <th>AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                            
                                                <?php foreach ($tamu as $tamu) :  ?>
                                                  <tr>  
                                                          <td><?= $tamu->id_tamu?></td>
                                                          <td><?= $tamu->namaTamu?></td>
                                                          <td><?= $tamu->noPolice?></td>
                                                          <td><?= $tamu->noTelp?></td>
                                                          <td>
                                                          <a style="text-decoration:none;" href="<?= base_url('profile/').$this->murry->enkrip($tamu->id_tamu)?>" class="btn-icon"> <i class="ti-user"></i> Profile</a>
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
