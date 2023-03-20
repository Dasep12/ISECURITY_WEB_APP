
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4 class="info-box-text">Selamat Data <?= $user->nama?> </h4>
        <h6 class="info-box-text">Ini ada Menu Melakukan Administrasi</h6>
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
            <h4 class="card-title">Control Database Akun User</h4>
          </div>
        </div>
      </div>

        <!-- <div class="col-6 col-lg-4 col-md-4 col-sm-6">
            <div class="info-box">
              <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="col-8">
                    <a href="<?= base_url('isecurity_contractor/Cd/User/PendafataranAKun')?>" class="text-dark">
                        <span class="info-box-text">Akun</span>
                        <span class="info-box-number">Pendaftaran Akun</span>
                        <p class="mb-0 text-success font-weight-bold">Control</p>
                    </div>
                    </a>
                    <div class="col-4">
                    <i class="fa fa-users fa-3x " aria-hidden="true"></i>
                    </div>
                </div>
              </div>
            </div>
        </div> -->
    </div>
    <div class="row">
      <div class="col-12 col-lg-12 col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="card-title">Hak Akses Akun Master</div>
              <div class="table-responsive scrollbar">
                <table class="mt-1 table table-sm   table-striped table-bordered" id="dataTabels">
                    <thead>
                        <tr>
                          <th class="pt-1 ps-0">
                            Nama
                          </th>
                          <th class="pt-1">
                            Aksi
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($akun as $akun) :  ?>
                            <tr>
                                <td class="py-1 ps-0">
                                    <div class="d-flex align-items-center">
                                    <img class="img-circle elevation-2" width="25px" src="<?php echo base_url('assets/dist/img/logo.jpeg')?>" alt="profile"/>
                                    <div class="ms-3">
                                        <p class="mb-0"><?= $akun->nama?></p>
                                        <p class="mb-0 text-muted text-small"><?= $akun->area_kerja?> / <?= $akun->npk?></p>
                                    </div>
                                    </div>
                                </td>
                                <td>
                                            <a href="http://103.63.25.164/guard_tour_adm/Mst_user/hapus/220909" onclick="return confirm('Yakin Hapus ?')" class='text-danger' title="hapus data"><i class="fa fa-trash"></i></a>

                                            <a href='' data-toggle="modal" data-target="#edit-data" class="text-primary ml-2 " title="lihat data" data-backdrop="static" data-keyboard="false" data-level="SECURITY" data-npk="220909" data-email="" data-grup="REGU_A"   data-status="1" data-plant="PLANT 5" data-site="WILAYAH 4" data-nama="DUDUNG"><i class="fa fa-eye"></i></a>

                                            <a href="<?= base_url('isecurity_contractor/Cd/User/ProfileAdmin/').$akun->id_karyawan?>" class='text-success  ml-2 ' title="edit data" data-backdrop="static" data-keyboard="false" data-id="220909"><i class="fa fa-edit"></i></a>

                                            <a href="<?= base_url('isecurity_contractor/Cd/User/EditPaswword/').$akun->id_karyawan?>" class="text-warning  ml-2 " title="rubah password"><i class="fas fa-lock"></i></a>
                                        </td>
                                <!-- <td> -->
                                <!-- <a style="text-decoration:none;" href="<?= base_url('isecurity_contractor/Cd/User/ProfileAdmin/').$akun->id_karyawan?>" class="btn-icon"> <i class="ti-user"></i> Profile</a>                                                           -->
                                <!-- <a style="text-decoration:none;" href="<?= base_url('Cd/User/ProfileAdmin/').$akun->id_karyawan?>" class="btn-icon"> <i class="ti-user"></i> Delete </a>                                                           -->
                                <!-- </td> -->
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
</section>

    