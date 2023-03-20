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
                <form id="UpdatePasswordUser" action="">
                        <input type="hidden" name="id_karyawan" id="id_karyawan" value="<?= $profile->id_karyawan ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Password </label>
                                <input  type="password"  name="pass1"  autocomplete="off" id="pass1" class="form-control" >
                            </div>

                           
                            <ul class="errorList"></ul>
                           
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan Data</button>
                        </div>
                        <!-- /.card-body -->
                    </form>
            </div>
        </div>
    </div>
  </div>
</section>
