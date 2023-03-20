
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
                        <h4 class="card-title"> Pendaftaran Tamu </h4> <br>
                        <p class="card-description"> Personal Informasi</p>
                        <form action="" class="form-sample" method="POST" id="PendaftaranTamu">
                                <p class="personal info"></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Nama Lengkap Tamu</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="namaTamu" id="TamuNama"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Nomor KTP/Passport </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="noKtp" name="noKtp" />
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
                                            <select  id="getperusahaan" name="perusahaan" class="form-select" style="width: 100%">
                                                    <option value='0'> -- Pilih Perusahaan -- </option>
                                            </select>
                                          
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Foto</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" id="fileGambar" name="file" />
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
        </div>
    </div>
</div>




