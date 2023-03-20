<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pendaftaran Akun Baru</h4>
                            <p class="card-description">Personal Karyawan</p>
                            <form action="" class="form-sample" method="POST" id="daftarAkun">
                                <p class="personal info"></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Nomor Pokok Karyawan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="npk" id="npk"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="namaLengkap" name="namaLengkap"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Wilayah</label>
                                            <div class="col-sm-9">
                                            <select class="form-select" name="wilayah" id="wilayah" >
                                                <option selected>Pilih Wilayah</option>
                                                <option value="WIL1">Wilayah 1</option>
                                                <option value="WIL2">Wilayah 2</option>
                                                <option value="WIL3">Wilayah 3</option>
                                                <option value="WIL4">Wilayah 4</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Area Kerja</label>
                                            <div class="col-sm-9">
                                            <select name="area" id="area" class="form-select">
                                                <option value="">Pilih Area Kerja</option>
                                            </select>
                                          
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Role</label>
                                            <div class="col-sm-9">
                                            <select name="role" id="role" class="form-select">
                                                <option selected="">Pilih Role Akun</option>
                                                <option value="ADM">ADMIN</option>
                                                <option value="KRL">KORLAP</option>
                                                <option value="PIC">PIC</option>
                                                <option value="SPV">SPV</option>
                                                <option value="MGT">MANAGER</option>
                                            </select>
                                          
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Foto Profil</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" id="file" name="file" onchange="return validasifileakun()"/>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="card-description">Hak Akses Akun</p>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Security Operation</label>
                                            <div class="col-sm-9 col-form-label  form-switch">
                                            <input class="form-check-input" id="SecOps" name="SecOps" value="1" type="checkbox" onclick='handleClick(this);'>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Security Admin</label>
                                            <div class="col-sm-9 col-form-label  form-switch">
                                            <input class="form-check-input" id="SecAdm" name="SecAdm" value="1" type="checkbox" onclick='handleClick(this);'>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Layanan Security</label>
                                            <div class="col-sm-9 col-form-label  form-switch">
                                            <input class="form-check-input" id="LaySec" name="LaySec" value="1" type="checkbox" onclick='handleClick(this);'>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Security Information</label>
                                            <div class="col-sm-9 col-form-label  form-switch">
                                            <input class="form-check-input" id="SecInfo" name="SecInfo" value="1" type="checkbox" onclick='handleClick(this);'>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Training</label>
                                            <div class="col-sm-9 col-form-label  form-switch">
                                            <input class="form-check-input" id="Training" name="Training" value="1"  type="checkbox"  onclick='handleClick(this);' >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">ASMS</label>
                                            <div class="col-sm-9 col-form-label  form-switch">
                                            <input class="form-check-input" id="Asms" name="Asms"  type="checkbox"  value="1" onclick='handleClick(this);' >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">ATSG</label>
                                            <div class="col-sm-9 col-form-label  form-switch">
                                            <input class="form-check-input" id="Atsg" name="Atsg"  type="checkbox" value="1"  onclick='handleClick(this);' >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">SMP</label>
                                            <div class="col-sm-9 col-form-label  form-switch">
                                            <input class="form-check-input" id="Smp" name="Smp"  type="checkbox" value="1" onclick='handleClick(this);' >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Control Database</label>
                                            <div class="col-sm-9 col-form-label  form-switch">
                                            <input class="form-check-input" id="Cd" name="Cd"  type="checkbox" value="1" onclick='handleClick(this);' >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Review</label>
                                            <div class="col-sm-9 col-form-label  form-switch">
                                            <input class="form-check-input" id="Review" name="Review" type="checkbox" onclick='handleClick(this);' >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Syncronize</label>
                                            <div class="col-sm-9 col-form-label  form-switch">
                                            <input class="form-check-input" id="Syncronize" name="Syncronize" type="checkbox" value="1" onclick='handleClick(this);'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Log</label>
                                            <div class="col-sm-9 col-form-label  form-switch">
                                            <input class="form-check-input" id="Log" name="AksesKendaraan" type="checkbox" value="1" onclick='handleClick(this);'>
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

