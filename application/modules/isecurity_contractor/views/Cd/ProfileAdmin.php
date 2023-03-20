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
                    <h4 class="card-title">Control Master User</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                </div>
                <form id="UpdateMasterAKunUser" action="">
                        <input type="hidden" name="id_karyawan" id="id_karyawan" value="<?= $profile->id_karyawan ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">NPK</label>
                                <input readonly type="text"  name="npk" value="<?= $profile->npk?>" autocomplete="off" id="npk" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">NAMA</label>
                                <input readonly type="text" name="nama"  autocomplete="off" value="<?= $profile->nama?>" id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">WILAYAH</label>
                                <input type="text" readonly name="wil" id="wil" autocomplete="off" value="<?= $profile->wilayah?>"  class="form-control">                                
                            </div>

                            <div id="list_plant">
                                <div class="form-group">
                                    <label for="">AREA KERJA</label>
                                    <select name="area_kerja" id="area_kerja" class="form-control">
                                        <option value="<?= $profile->area_kerja?>"><?= $profile->area_kerja?></option>
                                    </select>
                                </div>
                            </div>
                          
                            <!-- <div id="list_plant">
                                <div class="form-group">
                                    <label for="">APPLIKASI</label>
                                    <select name="appsId" id="appsId" class="form-control">
                                        <option value="<?= $profile->apps?>"><?= $profile->apps?></option>
                                        <option value=""> -- Pilih Applikasi -- </option>
                                        <option value="ISECURITY">ISECURITY</option>
                                        <option value="CSMS">CSMS</option>
                                    </select>
                                </div>
                            </div> -->

                            <div class="form-group">
                                <label for="">ROLE AKSES</label>
                                <select name="level" class="form-control" id="level">
                                    <option value="<?= $profile->role?>"><?= $profile->role?></option>
                                    <option value=""> -- Pilih Role -- </option>
                                    
                            </select>
                            </div>

                            <div class="form-group">
                                <label for="">STATUS</label>
                                <select name="status" class="form-control" id="status">
                                        <option value="<?= $profile->status?>"><?php if($profile->status == 1){
                                            echo 'ACTIVE';
                                        }else{
                                            echo 'INACTIVE';
                                        }?></option>
                                        <option value=""> -- Pilih Status Akun -- </option>
                                        <option value="1">ACTIVE</option>
                                        <option value="0">INACTIVE</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan Data</button>
                        </div>
                        <!-- /.card-body -->
                    </form>
            </div>
        </div>
    </div>
  </div>
</section>
