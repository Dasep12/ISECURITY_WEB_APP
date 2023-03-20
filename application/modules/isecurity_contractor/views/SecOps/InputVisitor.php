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
            <div class="col-lg-12 col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#karyawan" role="tab" aria-controls="home" aria-selected="true">Tamu Karyawan</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#bisnispartner" role="tab" aria-controls="profile" aria-selected="false">Tamu Bisnis Partner</a>
                    </li> -->
                    </ul>
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="karyawan" role="tabpanel" aria-labelledby="home-tab">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                            <div class="tab-content" id="home">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelleydby="home-tab">
                                        <div class="card-body">
                                            <h4 class="card-title">Pendaftaran Visitor Karyawan</h4> <br>
                                                    <p class="card-description">Personal Info</p>
                                                    <form action="" class="form-sample" method="POST" id="SecOpsPenVisitor">
                                                        <p class="personal info"></p>
                                                        <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Tamu</label>
                                                                    <div class="col-sm-9">
                                                                    <select  id="namaTa" name="namaTa" class="form-select" style="width: 100%">
                                                                            <option value='0'> -- Pilih Tamu -- </option>
                                                                    </select>
                                                                
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Nomor KTP/Passport </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" readonly id="noKtptamukar" name="noKtp"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Alamat Tempat Tinggal</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" readonly id="alamatTempatTinggaltamukar" name="alamatTempatTinggal"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Nomor Telphone</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" readonly id="no_hptamukar" name="no_hp"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Nomor Polisi Kendaraan</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" readonly id="nomorPolisiKendaraantamukar" name="nomorPolisiKendaraan"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Warga Negara</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" readonly id="wargaNegaratamukar" name="wargaNegara"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Perusahaan</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" readonly id="perusahaanTamutamukar" name="perusahaanTamu"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Bertemu</label>
                                                                    <div class="col-sm-9">
                                                                    <select  id="Bertemu" name="Bertemu" style="width: 100%; height: 75%;" class="form-select">
                                                                            <option value='0'> -- Pilih Karyawan -- </option>
                                                                    </select>
                                                                
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Department</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" readonly id="department" name="department"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Divisi</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" readonly id="divisi" name="divisi"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        
                                                        </div>   
                                                        <hr>
                                                      
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Perihal </label>
                                                                    <div class="col-sm-9">
                                                                    <select  id="kepentingan" name="kepentingan" style="width: 100%; height: 75%;" class="form-select">
                                                                    <option value='0'> -- Pilih Kepentingan -- </option>
                                                                        <option value='MEETING'>MEETING</option>
                                                                        <option value='INVOICE'>INVOICE</option>
                                                                        <option value='ANTAR / AMBIL DOKUMEN BARANG'>ANTAR / AMBIL DOKUMEN BARANG</option>
                                                                        <option value='TRAINING'>TRAINING</option>
                                                                        <option value='PROSES REKRUTMENT'>PROSES REKRUTMENT</option>
                                                                        <option value='SURVEY'>SURVEY</option>
                                                                        <option value='PROJECT'>PROJECT</option>
                                                                        <option value='EVENT'>EVENT</option>
                                                                        <option value='AUDIT'>AUDIT</option>
                                                                        <option value='PROJECT'>PROJECT</option>
                                                                    </select>
                                                                
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                        </div>

                                                        <hr>
                                                        <div class="row">            
                                                                <div class="col-md-6 d-flex start-end">
                                                                    <div class="form-group row">
                                                                    <div class="col-sm-9">
                                                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </form>
                                            </div>
                                    </div>
                            </div>
                            </div>
                        </div>  
                    </div>


                    <div class="tab-pane fade" id="bisnispartner" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="col-lg-12 col-md-12">
                            <div class="card">
                            <div class="tab-content" id="home">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelleydby="home-tab">
                                        <div class="card-body">
                                            <h4 class="card-title">Pendaftaran Visitor Bussiness Partner</h4> <br>
                                                    <p class="card-description">Personal Info</p>
                                                    <form action="" class="form-sample" method="POST" id="SecOpsPenVisitor">
                                                        <p class="personal info"></p>
                                                        <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Tamu</label>
                                                                    <div class="col-sm-9">
                                                                    <select  id="namaTamu" name="namaTamu" class="form-select" style="width: 100%">
                                                                            <option value='0'> -- Pilih Tamu -- </option>
                                                                    </select>
                                                                
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Nomor KTP/Passport </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" readonly id="noKtptamubp" name="noKtp"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Alamat Tempat Tinggal</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" readonly id="alamatTempatTinggaltamubp" name="alamatTempatTinggal"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Nomor Telphone</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" readonly id="no_hptamubp" name="no_hp"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Nomor Polisi Kendaraan</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" readonly id="nomorPolisiKendaraantamubp" name="nomorPolisiKendaraan"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Warga Negara</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" readonly id="wargaNegaratamubp" name="wargaNegara"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Perusahaan</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" readonly id="perusahaanTamutamubp" name="perusahaanTamu"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Bertemu</label>
                                                                    <div class="col-sm-9">
                                                                    <select  id="BertemuBp" name="BertemuBp" style="width: 100%; height: 75%;" class="form-select">
                                                                            <option value='0'> -- Pilih Bisnis Partner -- </option>
                                                                    </select>
                                                                
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Perusahaan</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" readonly id="perusahaanBp" name="perusahaanBp"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        
                                                        </div>   
                                                        <hr>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 col-form-label">Kepentingan</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"  id="kepentingan" name="kepentingan"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <div class="row">            
                                                                <div class="col-md-6 d-flex start-end">
                                                                    <div class="form-group row">
                                                                    <div class="col-sm-9">
                                                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </form>
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
</section>