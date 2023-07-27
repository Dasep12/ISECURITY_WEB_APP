<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pendaftaran Visitor</h4>
                            <p class="card-description">Personal Info</p>
                            <form action="" class="form-sample" method="POST" id="daftarTamu">
                                <p class="personal info"></p>
                                <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Tamu</label>
                                            <div class="col-sm-9">
                                            <select  id="namaTa" name="namaTa" class="form-select">
                                                    <option value='0'> -- Pilih Tamu -- </option>
                                            </select>
                                          
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Nomor KTP/Passport </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" readonly id="noKtp" name="noKtp"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Alamat Tempat Tinggal</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" readonly id="alamatTempatTinggal" name="alamatTempatTinggal"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Nomor Telphone</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" readonly id="no_hp" name="no_hp"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Nomor Polisi Kendaraan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" readonly id="nomorPolisiKendaraan" name="nomorPolisiKendaraan"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Warga Negara</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" readonly id="wargaNegara" name="wargaNegara"/>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Perusahaan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" readonly id="perusahaanTamu" name="perusahaanTamu"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Foto</label>
                                            <div class="col-sm-9">
                                            
                                                <input type="file" class="form-control" id="file" name="file" onchange="return validasifileakun()"/>
                                                <p class="card-description">Foto Visitor Bukan Foto KTP</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="card-description">Kepentingan</p>


                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Department</label>
                                            <div class="col-sm-9">
                                            <select  id="department" name="department" class="form-select">
                                                    <option value='0'> -- Pilih Department -- </option>
                                            </select>
                                          
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Divisi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"  id="divisi" name="divisi"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Bertemu Dengan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"  id="Bertemu" name="Bertemu"/>
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
</div>
